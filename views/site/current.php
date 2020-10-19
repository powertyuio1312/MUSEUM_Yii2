<?php
//$exid = $_GET['exid'];
    use yii\helpers\Html;
    $this->title = $exhibition['exName'];
?>



	<div class="container-fluid">

        		    <div class='container'>
        			    <div class='row'>
        				    <div class='col title-block'>
                        		<h1><?=$exhibition['exName']?></h1>
                        		<h3><?=$exhibition['author']?></h3>
                                <div>
                                </div>

        	                </div>
        			    </div>

        			    <div class='row main-row'>
            				<div class='col-sm-6 p-0'>
            					<img src='../img/<?=$exhibition['photo']?>' width='100%'>
            				</div>

            				<div class='col-sm-6 ex-content'>
            					<p><?=$exhibition['content']?></p>

                				<div class='dateprice'>
                					<label><?=$exhibition['date']?></label>
                					<label><?=$exhibition['time']?></label>
                				</div>

                                <a href="<?=\yii\helpers\Url::to(['getorder', 'id'=>$exhibition["exhibition_id"]])?>">Забронировать билет</a>
                                
                				
                                <label><?=$exhibition['price']?> р</label>

        				</div>
				</div>
			</div>
		</div>
	</div>
