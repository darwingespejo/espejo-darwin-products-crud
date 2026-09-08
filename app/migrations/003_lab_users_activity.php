<?php

class Lab_users_activity {

    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        $this->_lava->dbforge->add_column('users', [
            'firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => FALSE,
            ],
            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => FALSE,
            ],
        ]);

        if ($this->_lava->db->table('users')->count() > 0) {
            return;
        }

        $password = password_hash('password', PASSWORD_DEFAULT);
        $users = [
            ['firstname' => 'Juan', 'lastname' => 'Dela Cruz', 'email' => 'juan@example.com', 'username' => 'juandelacruz'],
            ['firstname' => 'Maria', 'lastname' => 'Santos', 'email' => 'maria@example.com', 'username' => 'mariasantos'],
            ['firstname' => 'Pedro', 'lastname' => 'Garcia', 'email' => 'pedro@example.com', 'username' => 'pedrogarcia'],
            ['firstname' => 'Ana', 'lastname' => 'Reyes', 'email' => 'ana@example.com', 'username' => 'anareyes'],
            ['firstname' => 'Jose', 'lastname' => 'Mendoza', 'email' => 'jose@example.com', 'username' => 'josemendoza'],
        ];

        foreach ($users as $user) {
            $user['password'] = $password;
            $this->_lava->db->table('users')->insert($user);
        }
    }

    public function down()
    {
        $this->_lava->dbforge->drop_column('users', 'firstname');
        $this->_lava->dbforge->drop_column('users', 'lastname');
    }
}