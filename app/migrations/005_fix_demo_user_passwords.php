<?php

class Fix_demo_user_passwords {

    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
    }

    public function up()
    {
        $password = '$2y$10$lo56nnIT.WN7oJXCdffSNuRlSv8sdO62BkfO9vQ/strU570OjTbIe';
        $usernames = ['juandelacruz', 'mariasantos', 'pedrogarcia', 'anareyes', 'josemendoza'];

        foreach ($usernames as $username) {
            $this->_lava->db->table('users')
                ->where('username', $username)
                ->update(['password' => $password]);
        }
    }

    public function down()
    {
        // Password hashes cannot be safely restored after this migration.
    }
}