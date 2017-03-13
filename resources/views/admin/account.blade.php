@extends ('layout')

@section('content')

    <div id="v-account" class="account">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Account Information</h1>
            <form method="POST" action="/account" class="form">
                <fieldset>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input class="form-control" type="text" id="username" name="username" value="{{ $data['username'] }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{ $data['email'] }}">
                    </div>

                    <div class="token-info">
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
                                    <td width="20%"><button @click="updateToken" class="btn btn-success">Reset Token</button></td>
                                </tr>
                            </tbody>
                        </table>
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
