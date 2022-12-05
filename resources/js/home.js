const { default: axios } = require("axios")
const { commentPlus, link } = require("fontawesome")
const { add, remove } = require("lodash")
const { Input } = require("postcss")

const {createApp} = Vue

const button = document.getElementById('bt')
let textoCopiado = document.getElementById("textoCop");
button.addEventListener('click', () =>{
    textoCopiado.select();
        textoCopiado.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("O texto é: " + textoCopiado.value);    
})

createApp({
data() {
    return {
        active:'',
        ac:"",
        adicionar:'',
        msg:'https://test.com.br',
        dados:[],
        edit:'http://127.0.0.1:8000/edit',
        totalLinks:'',
        n:0,
        input:'',
        index:'',
        element:''
    }
},
methods:{
openModal(e){
    if(this.input.value == ''){
        this.input = 'active'

            }
    this.active = 'active'
 setTimeout(()=>{
    alert('barra de scroll invisivel no Links de Redirecionamento 🌐')
 },400)
},
closedModal(){
    this.active = ''
},
add(){
    this.adicionar = 'active'
    this.msg= 'https://home.com.br'
},
remover(){
    this.adicionar = ''
},
openCreate(){
    this.ac = 'active'
},
closedCreate(){
    this.ac = ''
},
get(){
    const th = this
    axios.get("http://127.0.0.1:8000/api").then(function(req){
    th.dados = req.data
    th.totalLinks = th.dados.length 
    let d = th.dados.map((el , i)=>{
// console.log(el[i])
    })

})
},
copiar(){
textoCop.select()
},

click(e){
let per = document.querySelectorAll('.link')

per.forEach((el , i)=>{
    this.index = i
    this.element = i
    el.addEventListener('click',(e , i)=>{
this.index ++
    })
})
// this.n++
console.log(this.index)
},

reload(){
    window.location.href = "http://127.0.0.1:8000/";
},

},
mounted() {
    this.get()
},
}).mount('#app')