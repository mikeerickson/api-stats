@extends ('layout')

@section('content')

    <div id="v-account" class="account">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Account Information</h1>
            <form method="POST" action="account" class="form">
                <fieldset>
                    <div class="form-group hide">
                        <label for="id">ID</label>
                        <input class="form-control" type="text" id="id" name="id" value="{{ $data['id'] }}">
                    </div>

                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $data['name'] }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{ $data['email'] }}">
                    </div>

                    <div class="token-panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Token Information</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <th>Token</th>
                                <th>Expires</th>
                                <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="40%"><span id="token">{{ $data['token'] }}</span></td>
                                    <td width="40%"><span id="expires">{{ $data['expires'] }}</span></td>
                                    <td width="20%"><button @click="updateToken" class="btn btn-success btn-sm">Reset Token</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </fieldset>
                <div class="form-group token-button-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>

@stop
