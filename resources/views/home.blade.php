@extends('head')

<div id="app">
    
        {{-- modal --}}

    <div class="modal" :class="active">
        <button class="button-fechar" @@click="closedModal()">X</button>
        <div class="content-modal">
            <div class="head-modal">
                <div class="text-head-modal">
                    <h2>Links de Redirecionamento 🌐 </h2>
                    <p>Crie seus links de redirect em poucos passos</p>
                </div>
                <button @@click="openCreate()">Criar um Link</button>
            </div>
            <div class="links-modal">
                <div class="links">
                    <div class="head-link">
                        <p>@{{totalLinks}} links</p>
                        <p>Clique em tempo real</p>
                    </div>
                    <div class="lk">
                        <div class="link" id="linkid" @@click="click()" v-for="(dado, i , key) in dados">
                            <div class="text-link" id="txt" >
                                <div class="head-text-link">
                                    <p>Link Legal</p>
                                    <p>@{{dado.agora}}</p>
                                </div>
                                <div class="info-link">
                                    <a :id="index" :href="dado.url" :v-if="index > dado.cliques? reload() :'' " @@click="click(e)" target="_blank">@{{msg}}</a>
                                    <p>👉 @{{index}}/@{{dado.cliques}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-links">
                    <div class="head-info-links">
                        <div class="info">
                            <h2>Link Legal</h2>
                            <p>Criado em:  às 10:36</p>
                        </div>
                        <div class="text-links-info">
                            <input id="textoCop" type="text" value="redirect.gdigi.al/3hNU8HO">
                            <button id="bt" class="button-copy" @@click="copiar()"><strong>Copiar</strong></button>
                                <button class="button-edit"><strong>Editar</strong></button>
                        </div>
                    </div>
                    <div class="link-info">
                      <div class="child-link-info" v-for="dado in dados">
                        <p><strong>@{{dado.id}}</strong></p>
                        <div class="">
                            <div class="text-link-info">
                                <a href="">@{{dado.url}}</a>
                                <p>02/@{{dado.cliques}}</p>
                            </div>
                        </div>
                        <a :href="edit+dado.id">
                            <button><strong>Editar</strong></button>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}

    {{-- modal edit --}}

    <div class="create-modal" :class="ac">
        <div class="modal-create" :class="ac">
            <div class="head-modal-create">
                <h3>Criação de Link</h3>
                <button @@click="closedCreate()">X</button>
            </div>
            <div class="content-modal-create">
                <form action="/" method="post">
                    @csrf
                <div class="title-link">
                    <h4>Título do Link</h4>
                    <p>Link Legal</p>
                </div>
                <div class="url-original">
                    <h4>URL original</h4>
                    <p>Você poderá inserir uma ou várias URL’s, faça como desejar. Lembre-se de inserir a quantidade de cliques junto à URL.</p>
                </div>
                <div class="link-add">
                    <p>01</p>
                    <p>https://www.notion.so/Green-club-8d477635100044e4b3c5ca81c479fbdc</p>
                    <p>250</p>
                </div>
                <div class="add-link">
                        <div class="input-add-link" :class="adicionar">
                            <p><strong>02</strong></p>
                            <input :class="input" class="input-first" name="link" type="text" placeholder="Insira a URL original">
                            <input :class="input" class="input-number" name="click" type="number" placeholder="qtd cliques"> 
                        </div>
                        <button type="button" @@click="add()">+ Adicionar mais URL</button>
                    </div>
                    <div class="link-default">
                        <div class="">
                            <h4>URL Default</h4>
                            <p>Essa URL será associada ao redirecionamento apenas quando todas as outras chegarem ao limite de cliques. Ela será a uma url fixa sem limitação.</p>
                        </div>
                        <p>Insira a URL Default</p>
                        <button type="submit" @@click="openModal(e)">Salvar Link 💪</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- modal edit --}}
    <div class="home">
        <nav class="nav">
            <div class="">
                <img id="presente" src="./img/presente.png" @@click="openModal()" alt="">
                <p>clique aki</p>
            </div>
            <div class="imgs-nav">
                <img src="img/trofeu.png" alt="">
                <img src="img/user.png" alt="">
                <img src="img/chat.png" alt="">
            </div>
            <div class="ball-nav"></div>
        </nav>
    </div>
</div>

<script type="module" src="./js/home.js">
</script>