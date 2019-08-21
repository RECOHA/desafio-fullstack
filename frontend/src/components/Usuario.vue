<template>
    <b-container fluid>
        <b-row class="p-4">
            <b-col><h1>Usuários Cadastrados</h1></b-col>
            <b-col class="text-right p-2"><b-button v-b-modal.novoUsuario variant="primary">Novo Usuário</b-button></b-col>
        </b-row>
        <b-row class="pr-4 pl-4">
            <b-table striped hover bordered :items="usuarios" :per-page="quantidade" :current-page="atual" :fields="colunas">
                <template slot="[opcoes]" slot-scope="row">
                    <b-button-group size="sm">
                        <b-button variant="primary" v-b-modal.infoUsuario @click="visualizar(row.item.codigo)">Visualizar</b-button>
                        <b-button variant="dark" @click="editar(row.item.codigo)">Editar</b-button>
                        <b-button variant="danger" @click="excluir(row.item.codigo)">Excluir</b-button>
                    </b-button-group>
                </template>
            </b-table>
            <b-pagination v-model="atual" :total-rows="registros" :per-page="quantidade"></b-pagination>
        </b-row>

        <!-- Modal Novo Usuário -->
        <b-modal scrollable id="novoUsuario" ref="novoUsuario" size="lg" title="Novo Usuário">
            <b-form>
                <b-row>
                    <b-col cols="3">
                        <b-form-group label="CPF:" label-for="usu_cpf">
                            <b-form-input id="usu_cpf" size="sm" v-model="novoUsuario.usu_cpf" type="text" :formatter="mask_cpf"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="9">
                        <b-form-group label="Nome Completo:" label-for="usu_nome">
                            <b-form-input id="usu_nome" size="sm" v-model="novoUsuario.usu_nome" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col cols="3">
                        <b-form-group label="Data Nascimento:" label-for="usu_data_nascimento">
                            <b-form-input id="usu_data_nascimento" size="sm" v-model="novoUsuario.usu_data_nascimento" type="date"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="7">
                        <b-form-group label="E-mail:" label-for="usu_email">
                            <b-form-input id="usu_email" size="sm" v-model="novoUsuario.usu_email" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col cols="5">
                        <b-form-group label="Telefone:" label-for="usu_telefone">
                            <b-form-input id="usu_telefone" size="sm" v-model="novoUsuario.usu_telefone" type="text" :formatter="mask_tel"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col>
                        <b-form-group label="Nome Mãe:" label-for="usu_mae">
                            <b-form-input id="usu_mae" size="sm" v-model="novoUsuario.usu_mae" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col>
                        <b-form-group label="Nome Pai:" label-for="usu_pai">
                            <b-form-input id="usu_pai" size="sm" v-model="novoUsuario.usu_pai" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="3">
                        <b-form-group label="CEP:" label-for="usu_cep">
                            <b-form-input id="usu_cep" size="sm" v-model="novoUsuario.usu_cep" type="text" :formatter="mask_cep" @blur="consultaCep"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col cols="9">
                        <b-form-group label="Logradouro:" label-for="usu_logradouro">
                            <b-form-input id="usu_logradouro" size="sm" v-model="novoUsuario.usu_logradouro" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>

                <b-row>
                    <b-col cols="2">
                        <b-form-group label="Número:" label-for="usu_numero">
                            <b-form-input id="usu_numero" size="sm" v-model="novoUsuario.usu_numero" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col cols="3">
                        <b-form-group label="Complemento:" label-for="usu_complemento">
                            <b-form-input id="usu_complemento" size="sm" v-model="novoUsuario.usu_complemento" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col cols="3">
                        <b-form-group label="Bairro:" label-for="usu_bairro">
                            <b-form-input id="usu_bairro" size="sm" v-model="novoUsuario.usu_bairro" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                    <b-col cols="4">
                        <b-form-group label="Cidade:" label-for="usu_cidade">
                            <b-form-input id="usu_cidade" size="sm" v-model="novoUsuario.usu_cidade" type="text"></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
            </b-form>
            <b-row slot="modal-footer" class="pr-3">
                <b-button class="ml-1" variant="danger" @click="resetarModal('novoUsuario')">Limpar</b-button>
                <b-button class="ml-1" variant="light " @click="fecharModal">Cancelar</b-button>
                <b-button class="ml-1" variant="primary" @click="cadastrarUsuario">Ok</b-button>
            </b-row>
        </b-modal>

        <!-- Modal Visualizar -->
        <b-modal scrollable id="infoUsuario" ref="infoUsuario" size="lg" title="Informações do Usuário" @hidden="resetarModal('infoUsuario')">
            <b-row>
                <b-col cols="4">
                    <p><strong>CPF:</strong> {{ infoUsuario.usu_cpf }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>Nome:</strong> {{ infoUsuario.usu_nome }}</p>
                </b-col>
                <b-col cols="7">
                    <p><strong>Data Nascimento:</strong> {{ infoUsuario.usu_data_nascimento }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>E-mail:</strong> {{ infoUsuario.usu_email }}</p>
                </b-col>
                <b-col cols="7">
                    <p><strong>Telefone:</strong> {{ infoUsuario.usu_telefone }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>Mãe:</strong> {{ infoUsuario.usu_mae }}</p>
                </b-col>
                <b-col cols="7">
                    <p><strong>Pai:</strong> {{ infoUsuario.usu_pai }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>CEP:</strong> {{ infoUsuario.usu_cep }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>Logradouro:</strong> {{ infoUsuario.usu_logradouro }}</p>
                </b-col>
                <b-col cols="7">
                    <p><strong>Número:</strong> {{ infoUsuario.usu_numero }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>Complemento:</strong> {{ infoUsuario.usu_complemento }}</p>
                </b-col>
                <b-col cols="7">
                    <p><strong>Bairro:</strong> {{ infoUsuario.usu_bairro }}</p>
                </b-col>
            </b-row>
            <b-row>
                <b-col cols="5">
                    <p><strong>Cidade:</strong> {{ infoUsuario.usu_cidade }}</p>
                </b-col>
            </b-row>
            <b-row slot="modal-footer" class="pr-3">
                <b-button class="ml-1" variant="primary" @click="fecharModal">Ok</b-button>
            </b-row>
        </b-modal>
    </b-container>
</template>

<script>
import { http } from '../services/config'
import Swal from 'sweetalert2';

export default {
    data () {
        return {
            colunas: [
                { key: 'codigo', label: 'Código' },
                { key: 'nome', label: 'Nome', sortable: true },
                { key: 'cpf', label: 'CPF' },
                { key: 'data_nascimento', label: 'Data Nascimento' },
                { key: 'cidade', label: 'Cidade' },
                { key: 'opcoes', label: 'Opções' },
            ],
            quantidade: 5,
            atual: 1,
            infoUsuario: { usu_codigo: null, usu_nome: null, usu_cpf: null, usu_email: null, usu_mae: null, usu_pai: null, usu_data_nascimento: null, usu_telefone: null, usu_cep: null, usu_logradouro: null, usu_numero: null, usu_complemento: null, usu_bairro: null, usu_cidade: null },
            novoUsuario: { usu_codigo: null, usu_nome: null, usu_cpf: null, usu_email: null, usu_mae: null, usu_pai: null, usu_data_nascimento: null, usu_telefone: null, usu_cep: null, usu_logradouro: null, usu_numero: null, usu_complemento: null, usu_bairro: null, usu_cidade: null },
            usuarios: []
        }
    },
    mounted () {
        http.get('/usuarios').then(response => {
            response.data.forEach(e => {
                this.usuarios.push({
                    'codigo'          : e.usu_codigo,
                    'nome'            : e.usu_nome,
                    'cpf'             : e.usu_cpf,
                    'data_nascimento' : new Date(Date.parse(e.usu_data_nascimento)).toLocaleDateString('pt-BR'),
                    'cidade'          : e.usu_cidade,
                });
            });
        })
    },
    computed: {
        registros() {
            return this.usuarios.length
        }
    },
    methods: {
        mask_cpf (v) {
            return v.replace(/\D/g, '').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d)/, '$1.$2').replace(/(\d{3})(\d{1,2})/, '$1-$2').replace(/(-\d{2})\d+?$/, '$1');
        },
        mask_tel (v) {
            return v.replace(/\D/g, '').replace(/^(\d{2})(\d)/g, '($1) $2').replace(/(\d{5})(\d{4})+\d?$/, '$1-$2');
        },
        mask_cep (v) {
            return v.replace(/\D/g, '').replace(/^(\d{5})(\d{3})+\d?$/, '$1-$2');
        },
        consultaCep () {
            if (this.novoUsuario.usu_cep.length == 9) {
                this.$viaCep.buscarCep(this.novoUsuario.usu_cep).then(response => {
                    this.novoUsuario.usu_logradouro = response.logradouro;
                    this.novoUsuario.usu_complemento = response.complemento;
                    this.novoUsuario.usu_bairro = response.bairro;
                    this.novoUsuario.usu_cidade = response.localidade;
                })
            }
            else {
                return false;
            }
        },
        cadastrarUsuario (e) {
            e.preventDefault();
            var JSON = {
                'usu_nome': this.novoUsuario.usu_nome,
                'usu_cpf': this.novoUsuario.usu_cpf.replace(/\D/g, ''),
                'usu_email': this.novoUsuario.usu_email,
                'usu_mae': this.novoUsuario.usu_mae,
                'usu_pai': this.novoUsuario.usu_pai,
                'usu_data_nascimento': this.novoUsuario.usu_data_nascimento,
                'usu_telefone': this.novoUsuario.usu_telefone.replace(/\D/g, ''),
                'usu_cep': this.novoUsuario.usu_cep.replace(/\D/g, ''),
                'usu_logradouro': this.novoUsuario.usu_logradouro,
                'usu_numero': this.novoUsuario.usu_numero,
                'usu_complemento': this.novoUsuario.usu_complemento,
                'usu_bairro': this.novoUsuario.usu_bairro,
                'usu_cidade': this.novoUsuario.usu_cidade
            }
            http.post('/usuarios/novo', JSON).then(response => {
                this.usuarios.unshift({
                    'codigo'          : this.novoUsuario.usu_codigo,
                    'nome'            : this.novoUsuario.usu_nome,
                    'cpf'             : this.novoUsuario.usu_cpf,
                    'data_nascimento' : new Date(Date.parse(this.novoUsuario.usu_data_nascimento)).toLocaleDateString('pt-BR'),
                    'cidade'          : this.novoUsuario.usu_cidade,
                });
                this.fecharModal();
                Swal.fire({
                    title: 'Sucesso!',
                    text: response.mensagem,
                    type: 'success',
                    confirmButtonText: 'Ok!',
                })
            })
            .catch(error => {
                Swal.fire({
                    title: 'Erro!',
                    text: error.response.data.mensagem,
                    type: 'error',
                    confirmButtonText: 'Ok!',
                })
            })
        },
        visualizar (codigo) {
            http.get('/usuarios/visualizar/'+codigo).then(response => {
                response.data.forEach(e => {
                    this.infoUsuario.usu_codigo          = e.usu_codigo;
                    this.infoUsuario.usu_nome            = e.usu_nome;
                    this.infoUsuario.usu_cpf             = this.mask_cpf(e.usu_cpf);
                    this.infoUsuario.usu_email           = e.usu_email;
                    this.infoUsuario.usu_mae             = e.usu_mae;
                    this.infoUsuario.usu_pai             = e.usu_pai;
                    this.infoUsuario.usu_data_nascimento = new Date(Date.parse(e.usu_data_nascimento)).toLocaleDateString('pt-BR');
                    this.infoUsuario.usu_telefone        = this.mask_tel(e.usu_telefone);
                    this.infoUsuario.usu_cep             = this.mask_cep(e.usu_cep);
                    this.infoUsuario.usu_logradouro      = e.usu_logradouro;
                    this.infoUsuario.usu_numero          = e.usu_numero;
                    this.infoUsuario.usu_complemento     = e.usu_complemento;
                    this.infoUsuario.usu_bairro          = e.usu_bairro;
                    this.infoUsuario.usu_cidade          = e.usu_cidade;
                })
            });
        },
        editar (codigo) {

        },
        excluir (codigo) {
            http.get('/usuarios/excluir/'+codigo).then(response => {
                for (var i = 0; i < this.usuarios.length; i++) {
                    if (this.usuarios[i].codigo === codigo) {
                        this.usuarios.splice(i, 1);
                        Swal.fire({
                            title: 'Sucesso',
                            text: 'Usuário excluído com sucesso.',
                            type: 'success',
                            confirmButtonText: 'Ok!',
                        })
                    }
                }
            });
        },
        fecharModal () {
            this.$refs['novoUsuario'].hide();
            this.$refs['infoUsuario'].hide();
        },
        resetarModal (origem) {
            if (origem == 'novoUsuario') {
                this.novoUsuario.usu_nome            = null;
                this.novoUsuario.usu_cpf             = null;
                this.novoUsuario.usu_email           = null;
                this.novoUsuario.usu_mae             = null;
                this.novoUsuario.usu_pai             = null;
                this.novoUsuario.usu_data_nascimento = null;
                this.novoUsuario.usu_telefone        = null;
                this.novoUsuario.usu_cep             = null;
                this.novoUsuario.usu_logradouro      = null;
                this.novoUsuario.usu_numero          = null;
                this.novoUsuario.usu_complemento     = null;
                this.novoUsuario.usu_bairro          = null;
                this.novoUsuario.usu_cidade          = null;
            }
            if (origem == 'infoUsuario') {
                this.infoUsuario.usu_codigo          = null;
                this.infoUsuario.usu_nome            = null;
                this.infoUsuario.usu_cpf             = null;
                this.infoUsuario.usu_email           = null;
                this.infoUsuario.usu_mae             = null;
                this.infoUsuario.usu_pai             = null;
                this.infoUsuario.usu_data_nascimento = null;
                this.infoUsuario.usu_telefone        = null;
                this.infoUsuario.usu_cep             = null;
                this.infoUsuario.usu_logradouro      = null;
                this.infoUsuario.usu_numero          = null;
                this.infoUsuario.usu_complemento     = null;
                this.infoUsuario.usu_bairro          = null;
                this.infoUsuario.usu_cidade          = null;
            }
        }
    }
}
</script>

<style scoped>
</style>
