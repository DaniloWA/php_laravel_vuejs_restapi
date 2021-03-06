<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Item;
use App\Produto;
use App\ProdutosDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //cada parametro representa um metodo dentro do model que impelementa um relacionamento
        //Usando o With pra fazer um load previo modificando o lazy loading para Eager Loading carregamento ancioso
        $produtos = Item::with(['produtosDetalhe', 'fornecedor', 'rel3'])->paginate(10);
        
       /*  foreach($produtos as $key => $produto){
            //print_r($produto->getAttributes());
            //echo '<br><br>';

            $produtosDetalhe = ProdutosDetalhe::where('produto_id', $produto->id)->first();
            
            //Collection produtoDetalhe sem o first
            //Com o first estamos recuperando de fato o ProdutoDetalhe
             
            if(isset($produtosDetalhe)){
               // print_r($produtosDetalhe->getAttributes());

                //Utilizando a collection original $produtos porque o foreach cria uma copia do array que está percorrendo então eu não conseguiria afetar a colecao orginal             

                $produtos[$key]['comprimento'] = $produtosDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtosDetalhe->largura;
                $produtos[$key]['altura'] = $produtosDetalhe->altura;
            };

           // echo '<hr>';
        }; */
        
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$produto = new Produto();
        
        //$nome = $request->get('nome'); forma de tratar é instanciando o objeto e no final ->save(); 
        //$descricao = $request->get('descricao');
        

        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            //              exists:<tabela>,<coluna>
            'unidade_id' =>'exists:unidades,id',
            'fornecedor_id' =>'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 3 caracteres',
            'descricao.min' => 'O campo descrição deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no maximo 3 caracteres',
            'peso.integer' =>  'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O Fornecedor informada não existe'
        ];
        $request->validate($regras, $feedback);

        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        //$request->all();  payload dados que recebemos do form edit
        //$produto; Instancia do objeto no estado anterior antes de editar 
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            //              exists:<tabela>,<coluna>
            'unidade_id' =>'exists:unidades,id',
            'fornecedor_id' =>'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 3 caracteres',
            'descricao.min' => 'O campo descrição deve ter no minimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no maximo 3 caracteres',
            'peso.integer' =>  'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O Fornecedor informada não existe'
        ];
        $request->validate($regras, $feedback);
        //dd($request->all());
        $produto->update($request->all()); // Significa que os dados que recebemos do form iram atualizar os atributos do objeto na base de dados

        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
