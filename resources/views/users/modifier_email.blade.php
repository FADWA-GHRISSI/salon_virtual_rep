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

                <div class="content">

                    <div class="content" style="margin-top:0px;">
                        <div style="margin-left:0px;">

                            <div class="container businessCard" id="businessCard-1123">
                                <div class="card-body" style="display: block;">

                                    <form enctype="multipart/form-data" method="post" action="{{url('/users/update_email/' .Auth::user()->id )}}">
                                        {{csrf_field()}}
                                        {{ method_field('PUT')}}
                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group row">
                                                    <label class="col-md-4">Adresse e-mail * </label>
                                                    <input class="col-md-8 form-control" type="text" name="email" value="{{ Auth::user()->email }}"   >
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-4">Confirmation de l'email *</label>
                                                    <input class="col-md-8 form-control" type="text" name="email" value="{{ Auth::user()->email }}"   >
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-4">Mot de passe Actuel * </label>

                                                    <input type="password" class="form-control col-md-8" name="password" value="{{ Auth::user()->password }}">

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


                </div>

            </div>
        </div>
    </div>
@endsection
