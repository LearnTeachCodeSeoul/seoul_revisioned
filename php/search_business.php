<?php 
    try {
        $host = 'mompopkoapi.wcoding.com';
        $user = 'mompopko_api';
        $password = 'uAVPVDMZz9N8d9RC';
        $port = '8833';
        $dbname = 'mompopko';

        $dsn = 'mysql:host='. $host . ';port=' . $port . ';dbname=' . $dbname;

        $pdo = new PDO($dsn, $user, $password);

    } catch (Exception $e) {
        die('Error: '. $e->getMessage());
    }

    // URL get query value of searchKeyword
    $searchKeyword = $_GET['searchKeyword'];
    
    // Result of SQL
    $resultOfSQL = json_encode([]);

    if( !empty($searchKeyword) ) {
        $query = "SELECT
                        A.biz_id
                        ,A.biz_name
                        ,A.biz_level
                        ,IF(A.biz_level>1, 2, 1) AS biz_level_classify
                        ,ROUND((CHAR_LENGTH(CONCAT(A.biz_name, A.biz_interview_conts))-CHAR_LENGTH((CONCAT(REPLACE(A.biz_name,:searchKeyword,''),REPLACE(A.biz_interview_conts,:searchKeyword,''))))) / CHAR_LENGTH(:searchKeyword)) AS search_cnt
                        ,B.file_path
		                ,B.file_order
                FROM tb_biz A
                LEFT JOIN tb_file B
                ON A.file_grp_id = B.file_grp_id 
                WHERE (A.biz_interview_conts LIKE :searchKeywordInWhere OR A.biz_name LIKE :searchKeywordInWhere)
                AND B.file_order = 1
                ORDER BY biz_level_classify desc, search_cnt DESC";
        
        $req = $pdo->prepare($query);

        // setting for search word 
        $searchKeywordInWhere = "%" . $searchKeyword . "%";
        $req->bindParam(':searchKeyword', $searchKeyword,PDO::PARAM_STR);
        $req->bindParam(':searchKeyword', $searchKeyword,PDO::PARAM_STR);
        $req->bindParam(':searchKeyword', $searchKeyword,PDO::PARAM_STR);
        $req->bindParam(':searchKeywordInWhere', $searchKeywordInWhere,PDO::PARAM_STR);
        $req->bindParam(':searchKeywordInWhere', $searchKeywordInWhere,PDO::PARAM_STR);

        //execute query
        $req->execute();

        while($result=$req->fetchAll()){
            if($result!=""){
                $resultOfSQL = json_encode($result);
            } 
        }
    }
?>

<!DOCTYPE html>
<html>
    
    <!-- includes <head>, <body> <header> tags -->
    <?php require "header.php"?>
    
    <section id="content">
	    <div class="container">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs">
                        <!-- title for "Results of keyword" -->
					  	<li><h3 class="title" id="result_title"> </h3></li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="result" class="tab-pane fade in active">
                    </div>
                    <div class="col-xs-12 alignright mgbottom30" id="recent_button">
                    </div>
				</div>
			</div>
		</div>
    </section>

    <!-- includes <body> <footer>, <a> for scroll up, 3 <script> tags -->
    <?php require "footer.php"?>
    
    <!-- script for pass php values to search_business.js -->
    <script type="text/javascript">
        let objResultOfSQL = <?= $resultOfSQL ?>;
        let objData = {sqlData: objResultOfSQL, searchKeyword: "<?= $searchKeyword ?>"};
    </script>
    
    <!-- search logics in this script -->
    <script src="../public/js/search_business.js"></script>
    
</html>
