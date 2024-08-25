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
            where match(log_msg) against (? in boolean mode) and log_type != 'Login'
            group by date(log_date)
            order by log_date desc
            limit 7
    SQL);
    $activites->execute([$_GET['realname']??'foo']);

    $result = [];
    while ($data = $activites->fetchObject()) {
        $result[$data->activity_date] = $data->total;
    }

    exit(json_encode([
        'status' => true,
        'data' => $result
    ]));
});

$router->map('GET', '/member/top', function() {
//     SELECT loan.member_id, member.member_name, member.member_image,
//     (select count(sl.loan_id) from loan as sl where sl.member_id = loan.member_id and sl.is_lent = 1 and sl.is_return = 0) as lent,
//     (select count(sl.loan_id) from loan as sl where sl.member_id = loan.member_id and sl.is_lent = 1 and sl.is_return = 1) as `return`
//   FROM `loan`
//   inner join member on member.member_id = loan.member_id
//   group by loan.member_id
//   order by count(loan_id) desc
//   limit 5
});

$router->run();
