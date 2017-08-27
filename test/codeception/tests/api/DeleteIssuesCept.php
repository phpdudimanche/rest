<?php 
$I = new ApiTester($scenario);
$I->wantTo('delete an issue');
$I->sendDELETE('issues/345');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200 include by this waya and not use
$I->seeResponseIsJson();
$I->seeResponseContains('"id":345');// direct values without { }