<?php

use Illuminate\Database\Seeder;

class TabelaUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'usu_codigo'          => '1',
                'usu_nome'            => 'Carlos Amaral Gomes',
                'usu_cpf'             => '25243302732',
                'usu_email'           => 'carlos.gomes@icloud.com',
                'usu_mae'             => 'Ana Amaral Silva',
                'usu_pai'             => 'Henry Gomes',
                'usu_data_nascimento' => '1974-05-02',
                'usu_telefone'        => '7186078952',
                'usu_cep'             => '40725074',
                'usu_logradouro'      => 'Rua Anita Cajado',
                'usu_numero'          => '184',
                'usu_complemento'     => null,
                'usu_bairro'          => 'Praia Grande',
                'usu_cidade'          => 'Maringá',
                'created_at'          => date('Y-m-d H:i:00'),
                'updated_at'          => date('Y-m-d H:i:00')
            ],
            [
                'usu_codigo'          => '2',
                'usu_nome'            => 'Mariana Almeida Teixeira',
                'usu_cpf'             => '44971517863',
                'usu_email'           => 'mariana.almeida@gmail.com',
                'usu_mae'             => 'Maitê Tânia Almeida',
                'usu_pai'             => 'José Alexandre Teixeira',
                'usu_data_nascimento' => '1998-07-21',
                'usu_telefone'        => '61949089805',
                'usu_cep'             => '70342500',
                'usu_logradouro'      => 'Praça Anita Garibaldi',
                'usu_numero'          => '86',
                'usu_complemento'     => 'Apto 201',
                'usu_bairro'          => 'Centro',
                'usu_cidade'          => 'Curitiba',
                'created_at'          => date('Y-m-d H:i:00'),
                'updated_at'          => date('Y-m-d H:i:00')
            ],
            [
                'usu_codigo'          => '3',
                'usu_nome'            => 'Lara Machado Novaes',
                'usu_cpf'             => '08699144300',
                'usu_email'           => 'lara.novaes@yahoo.com',
                'usu_mae'             => 'Marina Sandra Novaes',
                'usu_pai'             => 'Filipe Luís Machado',
                'usu_data_nascimento' => '1986-12-19',
                'usu_telefone'        => '31956332333',
                'usu_cep'             => '31210440',
                'usu_logradouro'      => 'Rua Anfibólios',
                'usu_numero'          => '236',
                'usu_complemento'     => null,
                'usu_bairro'          => 'Bonfim',
                'usu_cidade'          => 'Londrina',
                'created_at'          => date('Y-m-d H:i:00'),
                'updated_at'          => date('Y-m-d H:i:00')
            ],
        ]);
    }
}
