<?php

		if (isset($this->_blForm['submit'])) {
			$spotUserSystem = new SpotUserSystem($this->_db, $this->_settings);
			$spotUserSystem->addSpotterToBlacklist($this->_currentSession['user']['userid'], $blackList['spotterid'], $blackList['origin']);