<?php 
$I = new ApiTester($scenario);
$I->wantTo('create an issue');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('issues/',['title'=>'my title','description'=>'my description']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200 include by this waya and not use
$I->seeResponseIsJson();
$I->seeResponseContains('"title":"my title"');// direct values without { }