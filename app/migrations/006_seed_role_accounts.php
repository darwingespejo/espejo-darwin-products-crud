<?php

class Seed_role_accounts {

    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
    }

    public function up()
    {
        $password = '$2y$10$LWoO8BnTBYh1xft9fwfCG.9pm6eTVCAJ0vxB06a9dTa6RkUMHj.iK';
        $accounts = [
            ['username' => 'admin', 'role' => 'admin', 'email' => 'admin@example.com', 'firstname' => 'System', 'lastname' => 'Administrator'],
            ['username' => 'user', 'role' => 'user', 'email' => 'user@example.com', 'firstname' => 'Standard', 'lastname' => 'User'],
        ];

        foreach ($accounts as $account) {
            $existing = $this->_lava->db->table('users')
                ->where('username', $account['username'])
                ->get();

            $data = [
                'firstname' => $account['firstname'],
                'lastname'  => $account['lastname'],
                'email'     => $account['email'],
                'password'  => $password,
                'role'      => $account['role'],
                'is_active' => 1,
            ];

            if ($existing) {
                $this->_lava->db->table('users')
                    ->where('username', $account['username'])
                    ->update($data);
            } else {
                $data['username'] = $account['username'];
                $this->_lava->db->table('users')->insert($data);
            }
        }
    }

    public function down()
    {
        $this->_lava->db->table('users')->where('username', 'admin')->delete();
        $this->_lava->db->table('users')->where('username', 'user')->delete();
    }
}