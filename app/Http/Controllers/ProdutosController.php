<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProdutosController extends Controller
{
        //
    public function index(){
        $produtos = Produto::paginate(4);
        return view('produto.index', array('produtos' => $produtos,'busca'=>null));
    }
    public function show($id){
        $produto = Produto::find($id);
        return view('produto.show',array('produto' => $produto));
    }
    public function buscar(Request $request){
        $produtos = Produto::where('titulo','LIKE','%'.$request->input('busca').'%')
        ->orwhere('descricao','LIKE','%'.$request->input('busca').'%')->paginate(4);
        return view('produto.index',array('produtos'=> $produtos, 'busca'=> $request-> input('busca')));
    }

    public function create()
    {
        if(Auth::check()){
            return view('produto.create');

        }else{
            redirect('login');
        }

    }

    public function store(Request $request){
        if(Auth::check()){
            $produto = new Produto();

            $this->validate($request, ['referencia' => 'required|unique:produtos|min:3','titulo' => 'required|min:3',]);



            $produto ->referencia = $request->input('referencia');
            $produto ->titulo = $request ->input('titulo');
            $produto ->descricao = $request ->input('descricao');

            $produto ->preco = $request ->input('preco');

            if($produto -> save()){
                return redirect('produtos');
            }
        }else{
            redirect('login');
        }

    }

    public function edit($id){
        if(Auth::check()){
            $produto = Produto::find($id);
            return view('produto.edit',array('produto'=> $produto));
        }else{
            redirect('login');
        }

    }
    public function update($id,Request $request){
        if(Auth::check()){
            $produto = Produto::find($id);
            $this->validate($request,[
                'referencia' => 'required|min:3',
                'titulo' => 'required|min:3',
                'preco' => 'required|numeric'
            ]);
            if($request->file('fotoproduto')){
                $imagem = $request->file('fotoproduto');
                $nomearquivo = md5($id) .".".$imagem->getClientOriginalExtension();
                $request->file('fotoproduto')->move(public_path('./img/produtos/'),
                    $nomearquivo);
            }
            $produto->referencia = $request->input('referencia');
            $produto->titulo = $request->input('titulo');
            $produto->descricao = $request->input('descricao');
            $produto->preco = $request->input('preco');
            $produto->save();
            Session::flash('mensagem','Produto Alterado com Sucesso.');
            return redirect()->back();
        }else{
            return redirect('login');
        }

    }

    public function destroy($id){
        if(Auth::check()){
            $produto = Produto::find($id);
            $produto->delete();
            Session::flash('mensagem','Produto Excluido com sucesso');
            return redirect()->back();
        }else{
            redirect('login');
        }

    }
}
