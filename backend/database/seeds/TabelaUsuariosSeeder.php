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
                'usu_codigo'          => 1,
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
                'usu_codigo'          => 2,
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
                'usu_codigo'          => 3,
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
            [
                'usu_codigo'          => 4,
                'usu_nome'            => 'Erick Torrente Santos',
                'usu_cpf'             => '49908856197',
                'usu_email'           => 'erick.santos@live.com',
                'usu_mae'             => 'Ivete Dias Torrente',
                'usu_pai'             => 'José Antônio Santos',
                'usu_data_nascimento' => '1991-08-02',
                'usu_telefone'        => '44998946512',
                'usu_cep'             => '31210440',
                'usu_logradouro'      => 'Rua Coronel Albino',
                'usu_numero'          => null,
                'usu_complemento'     => null,
                'usu_bairro'          => 'Jardim Belo Horizonte',
                'usu_cidade'          => 'Presidente Prudente',
                'created_at'          => date('Y-m-d H:i:00'),
                'updated_at'          => date('Y-m-d H:i:00')
            ],
            [
                'usu_codigo'          => 5,
                'usu_nome'            => 'Ana Paula Gomes Teixeira',
                'usu_cpf'             => '43265109003',
                'usu_email'           => 'ana paula.teixeira@icloud.com',
                'usu_mae'             => 'Maria Gomes Amaral',
                'usu_pai'             => 'Pedro Teixeira Machado',
                'usu_data_nascimento' => '1981-01-25',
                'usu_telefone'        => '11986776373',
                'usu_cep'             => '01505010',
                'usu_logradouro'      => 'Rua Anita Ferraz',
                'usu_numero'          => '133',
                'usu_complemento'     => null,
                'usu_bairro'          => 'Sé',
                'usu_cidade'          => 'São Paulo',
                'created_at'          => date('Y-m-d H:i:00'),
                'updated_at'          => date('Y-m-d H:i:00')
            ],
            [
                'usu_codigo'          => 6,
                'usu_nome'            => 'Arthur Amaral Ducati',
                'usu_cpf'             => '69811449724',
                'usu_email'           => 'arthur.ducati@uol.com.br',
                'usu_mae'             => 'Gabriela Amaral Ducati',
                'usu_pai'             => 'Pedro Ducati',
                'usu_data_nascimento' => '1998-10-26',
                'usu_telefone'        => '11983571795',
                'usu_cep'             => '05421010',
                'usu_logradouro'      => 'Rua Álvaro Anes',
                'usu_numero'          => '504',
                'usu_complemento'     => null,
                'usu_bairro'          => 'Pinheiros',
                'usu_cidade'          => 'São Paulo',
                'created_at'          => date('Y-m-d H:i:00'),
                'updated_at'          => date('Y-m-d H:i:00')
            ]
        ]);
    }
}
