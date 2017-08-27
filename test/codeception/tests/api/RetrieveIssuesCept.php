<?php 
$I = new ApiTester($scenario);
$I->wantTo('retrieve an issue');
$I->sendGET('issues/345');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200 include by this waya and not use
$I->seeResponseIsJson();
$I->seeResponseContains('"id":345');// direct values without { }