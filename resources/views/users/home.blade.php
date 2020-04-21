@extends('layouts.app')
<style>

    .businessCard {
        max-width: 480px;
        border: 1px solid #1a499b;
        min-height: inherit;
        padding: 0;
        z-index: 5000;
        background-color: #FFF;
    }
    .businessCard .header {
        border-bottom: 1px solid #0168AE;
        background-color: #1a499b;
        height: 30px;
        line-height: 30px;
        color: #fff;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            </div>

            <!--supprimer user-->

            <div class="modal fade" id="modalDeleteUser{{Auth::user()->id }}">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h4 class="modal-title">Attention</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Etes-vous certain(e) de vouloir supprimer cet utilisateur ? <br> <small><cite title="Source Title">La suppression est définitive.</cite> </small> </p>
                        </div>
                        <div class="modal-footer justify-content-between">

                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Annuler</button>
                            <a href="{{'/users/supprimer_user/' .Auth::user()->id}}" type="submit" class="btn btn-outline-light">Supprimer</a>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>








            <div class="content">

                <div class="content" style="margin-top:0px;">
                    <h4 style="width:70%;color:#024C8C;">Votre compte et informations personnelles</h4>
                    <div style="margin-left:0px;">

                        <div class="container businessCard" id="businessCard-1123">
                            <div class="card-body" style="display: block;">
                                <a href="{{ '/users/modifier_email/'.Auth::user()->id }}"> Changer votre email</a><br/>
                                <a href="{{ '/users/modifier_pwd/'.Auth::user()->id }}"> Changer votre Mot de passe</a><br/>
                                <a href="" data-toggle="modal" data-target="#modalDeleteUser{{Auth::user()->id}}">Supprimer Votre compte</a>
                                <form enctype="multipart/form-data" method="post" action="{{url('/users/update_user/' .Auth::user()->id )}}">
                                    {{csrf_field()}}
                                    {{ method_field('PUT')}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4">Status*</label>
                                                <select class="form-control col-md-8" style="width: 100%;" name="status" required>
                                                    <option></option>
                                                    <option value="Mr" @if(Auth::user()->status=='Mr') {{'selected'}} @endif>Mr</option>
                                                    <option value="Mme" @if(Auth::user()->status=='Mme') {{'selected'}} @endif>Mme</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Prénom </label>
                                                <input class="col-md-8 form-control" type="text" name="prenom" value="{{ Auth::user()->prenom }}"   required>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Nom </label>
                                                <input class="col-md-8 form-control" type="text" name="name" value="{{ Auth::user()->name }}"   required>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Fonction </label>

                                                <input type="text" class="form-control col-md-8" name="fonction" value="{{ Auth::user()->fonction }}"  required>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Telephone *</label>
                                                <input type="text" class="form-control col-md-8" name="telephone"  value="{{ Auth::user()->telephone }}" required>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Mobile</label>
                                                <input type="text" class="form-control col-md-8" name="mobile"  value="{{ Auth::user()->mobile }}" required>

                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4"><strong>Langues parlées</strong></label>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Langue1</label>
                                                <select name="langue1" class="form-control col-md-8">
                                                    <option value=""></option>

                                                    <option value="FR" @if(Auth::user()->langue1=='FR') {{'selected'}}@endif>Français</option>
                                                    <option value="AL" @if(Auth::user()->langue1=='AL') {{'selected'}}@endif>Allemand</option>
                                                    <option value="AR" @if(Auth::user()->langue1=='AR') {{'selected'}}@endif>Arabe</option>
                                                    <option value="IT"@if(Auth::user()->langue1=='IT') {{'selected'}}@endif>Italie</option>

                                                </select>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Langue2</label>
                                                <select name="langue2" class="form-control col-md-8">
                                                    <option value=""></option>

                                                    <option value="FR" @if(Auth::user()->langue2=='FR') {{'selected'}}@endif>Français</option>
                                                    <option value="AL" @if(Auth::user()->langue2=='AL') {{'selected'}}@endif>Allemand</option>
                                                    <option value="AR" @if(Auth::user()->langue2=='AR') {{'selected'}}@endif>Arabe</option>
                                                    <option value="IT"@if(Auth::user()->langue2=='IT') {{'selected'}}@endif>Italie</option>

                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-4">Langue3</label>
                                                <select name="langue3" class="form-control col-md-8">
                                                    <option value=""></option>

                                                    <option value="FR" @if(Auth::user()->langue3=='FR') {{'selected'}}@endif>Français</option>
                                                    <option value="AL" @if(Auth::user()->langue3=='AL') {{'selected'}}@endif>Allemand</option>
                                                    <option value="AR" @if(Auth::user()->langue3=='AR') {{'selected'}}@endif>Arabe</option>
                                                    <option value="IT"@if(Auth::user()->langue3=='IT') {{'selected'}}@endif>Italie</option>

                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">Langue4</label>
                                                <select name="langue4" class="form-control col-md-8">
                                                    <option value=""></option>

                                                    <option value="FR" @if(Auth::user()->langue4=='FR') {{'selected'}}@endif>Français</option>
                                                    <option value="AL" @if(Auth::user()->langue4=='AL') {{'selected'}}@endif>Allemand</option>
                                                    <option value="AR" @if(Auth::user()->langue4=='AR') {{'selected'}}@endif>Arabe</option>
                                                    <option value="IT"@if(Auth::user()->langue4=='IT') {{'selected'}}@endif>Italie</option>

                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="submit" value="Sauver" class="btn btn-success float-left">
                                        </div>
                                    </div>
                                </form>

                            </div>








                        </div>
                    </div>
                </div>










                <div class="content" style="margin-top:0px;">
                    <h4 style="width:70%;color:#024C8C;">Voir ma carte professionnelle</h4>
                    <div style="margin-left:0px;">

                        <div class="container businessCard" id="businessCard-1123">
                            <div class="row">
                                <div class="col-sm-12 header">Visiteur</div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3 col-sm-push-9 photo logo"></div>

                                <div class="col-sm-9 col-sm-pull-3">
                                    <div style="clear:both;"></div>
                                    <div style="font-weight: bold; font-size: 14px; margin-top:10px;">{{ Auth::user()->name }}</div><div style="font-size: 14px;"> @if(Auth::user()->fonction=='Administrateur')<p>Administrateur</p>@else<p>Utilisateur</p>@endif</div><div style="font-size: 12px;margin-top:8px;">Email: {{ Auth::user()->email }}</div>
                                    <div style="font-size: 12px;">Tel:{{ Auth::user()->telephone }} </div>
                                    <div style="font-size: 12px;">GSM:{{ Auth::user()->mobile }}   </div>
                                    <div style="font-size: 12px;">{{ Auth::user()->langue1 }} </div><div style="font-size: 15px;font-weight: bold;margin-top:5px;"></div>
                                    <div style="font-size: 12px;"></div>
                                    <div style="font-size: 12px;"></div>
                                    <div style="font-size: 12px; margin-bottom:10px;"> {{ Auth::user()->pays }} </div> </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
