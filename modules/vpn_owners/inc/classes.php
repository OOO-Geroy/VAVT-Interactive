<?php
    namespace vavt_interactive\modules\vpn_owners;

    class JsonRoot {

        public $lang = 'de';
        public $data = [];

        function __construct($owners) {
            foreach($owners as $owner) {
				$ownder_data = new Owner($owner['data']['name'], new Property('Adresse', $owner['data']['address']));
				foreach($owner["providers"] as $provider) {
					$ownder_data->providers[] = new Provider($provider['data'],$owner['data']['name']);
                }
                
				$this->data[] = $ownder_data;
			}
        }
    }

    class Owner {

        public $owner = null;
        public $info = [];
        public $providers = [];

        public function __construct($o, Property $i) {
            $this->owner = $o;
            $this->info[] = $i;
        }
    }

    class Provider {

        public $name = null;
        public $link = null;
        public $info = null;

        public function __construct($data, $owner_name) {
            
            $this->name = $data['name'];
            if($owner_name) $this->info[] = new Property('Eigentümer', $owner_name);
            if(!empty($data['review_link'])) $this->link = $data['review_link'];
            if(!empty($data['media_participation']))  $this->info[] = new Property('Medienbeteiligung', $data['media_participation']);
            if(!empty($data['operating_company']))  $this->info[] = new Property('Betreiberfirma', $data['operating_company']);
        }
    }

    class Property {

        public $name = null;
        public $value = null;

        public function __construct($n, $v) {
            $this->name = $n;
            $this->value = $v;
        }
    }