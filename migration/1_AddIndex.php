<?php
use SLiMS\DB;

class AddIndex
{
    function up()
    {
        try {
            DB::getInstance()->query(<<<SQL
            alter table `system_log` add index `log_date` (`log_date`) 
            SQL);
        } catch (Throwable $th) {
            //throw $th;
        }
    }

    function down()
    {
        
    }
}