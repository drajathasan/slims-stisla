<?php
use SLiMS\DB;

defined('STISLA_DIR') or die('Direct access is not allowed!');

require LIB . 'router.inc.php';

header('Content-Type: application/json', true);

/*----------  Create router object  ----------*/
$router = new Router($sysconf, $dbs);
$router->setBasePath('api');

$router->map('GET', '/fines', function() {
    $fines = DB::getInstance()->query('select sum(debet) as total_each_day, fines_date from fines group by fines_date order by fines_date desc limit 7');

    $chart = [];
    $total = 0;
    while ($data = $fines->fetchObject()) {
        $chart[$data->fines_date] = $data->total_each_day;
        $total += $data->total_each_day;
    }

    exit(json_encode([
        'status' => true,
        'data' => [
            'chart' => $chart,
            'total' => number_format($total)
        ]
    ]));
});

$router->map('GET', '/collections', function() {
    header('Cache-Control: max-age=300');
    $collections = DB::getInstance()->query(<<<SQL
        select
            (select count(biblio_id) from biblio) as bibliography,
            (select count(item_code) from item) as item, 
            (
                select 
                    count(loan.item_code) 
                    from 
                        loan 
                    inner join 
                        item on item.item_code = loan.item_code 
                    where
                        is_lent = 1 and is_return = 0
            ) as item_lent
    SQL);

    $data = $collections->fetchObject();
    $data->item_available = $data->item - $data->item_lent;

    exit(json_encode([
        'status' => true,
        'data' => $data
    ]));
});

$router->map('GET', '/activities', function() {
    $activites = DB::getInstance()->prepare(<<<SQL
        select count(log_type) as total, date(log_date) as `activity_date`
            from system_log
            where id = ? and log_type != 'Login' and log_location != 'login'
            group by date(log_date)
            order by log_date desc
            limit 7
    SQL);
    $activites->execute([$_GET['uid']??0]);

    $result = [];
    $total = 0;
    while ($data = $activites->fetchObject()) {
        $result[$data->activity_date] = $data->total;
        $total += $data->total;
    }

    exit(json_encode([
        'status' => true,
        'data' => [
            'chart' => $result,
            'total' => $total
        ]
    ]));
});

$router->map('GET', '/member/top', function() {
    $limit = 5;
    $year = date('Y');
    $sql = "SELECT m.member_name, mm.member_type_name, m.member_image, COUNT(*) AS total, GROUP_CONCAT(i.biblio_id SEPARATOR ';') AS biblio_id
      FROM loan AS l
      LEFT JOIN member AS m ON l.member_id=m.member_id
      LEFT JOIN mst_member_type AS mm ON m.member_type_id=mm.member_type_id
      LEFT JOIN item As i ON l.item_code=i.item_code
      WHERE
        l.loan_date LIKE '{$year}-%' AND
        m.member_name IS NOT NULL
      GROUP BY m.member_id
      ORDER BY total DESC
      LIMIT {$limit}";

    $query = DB::getInstance()->query($sql);
    $return = array();
    if ($query) {
        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $title = array_unique(explode(';', $data['biblio_id']));
            $return[] = array(
                'name' => $data['member_name'],
                'type' => $data['member_type_name'],
                'image' =>  SWB . 'lib/minigalnano/createthumb.php?filename=images/persons/' . $data['member_image'],
                'total' => $data['total'],
                'total_title' => count($title),
                'order' => $data['total']+count($title));
        }
    }

    usort($return, function ($a, $b) {
        return $b['order'] <=> $a['order'];
    });

    exit(json_encode([
        'status' => true,
        'data' => $return
    ]));
});

$router->run();
