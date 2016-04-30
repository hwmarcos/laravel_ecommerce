<?php namespace CodeCommerce\Events;

    use CodeCommerce\Events\Event;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

    class CheckoutEvent extends Event {

        use SerializesModels;

        private $user;
        private $order;

        /**
         * Create a new event instance.
         *
         * @return void
         */
        public function __construct($user, $order) {
            $this->user = $user;
            $this->order = $order;
        }
        
        public function getUser(){
            return $this->user;
        }
        
         public function getOrder(){
            return $this->order;
        }

        /**
         * Get the channels the event should be broadcast on.
         *
         * @return array
         */
        public function broadcastOn() {
            return [];
        }

    }
