<?php 
$I = new ApiTester($scenario);
$I->wantTo('update an issue');
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPUT('issues/56',['title'=>'my new title','description'=>'my new description']);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200 include by this waya and not use
$I->seeResponseIsJson();
$I->seeResponseContains('"title":"my new title"');// direct values without { }
$I->seeResponseContains('"id":56');