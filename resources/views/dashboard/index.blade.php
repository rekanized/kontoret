@extends('layouts.main-layout')
@section('content')
    <style>
        form {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 30px;
            margin: 16px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px -4px black;
        }
        form input {
            margin: 6px 0px 16px 0px;
        }
        form label {
            text-align: left;
            margin: 0px 12px;
            font-weight: bold;
        }
    </style>
    <div class="transparentsectionbox">
        <div style="display: flex;align-items:center;justify-content:center;flex-direction: column;padding: 16px;">
            <h1 style="display: flex;align-items: center;margin: 0px;"><span class="material-symbols-outlined" style="padding: 10px;font-size: 60px">dashboard</span>Dashboard Control Panel</h1>
        </div>
    </div>
    <div class="sectionbox">
        <div style="display:flex;align-items: center;">
            <div style="display:flex;flex-wrap: wrap;justify-content: center;flex-direction:column">
                <h2 style="text-align: center;">Azure integration</h2>
                <form style="width: 500px;display:flex;flex-direction: column;" method="POST" action="/test-azure-setup">
                    @csrf
                    <label for="azure_tenant_id">Azure Tenant ID</label>
                    <input type="text" name="azure_tenant_id" />
                    <label for="azure_app_id">Azure App ID</label>
                    <input type="text" name="azure_app_id" />
                    <label for="azure_secret">Azure Secret</label>
                    <input type="text" name="azure_secret" />
                    <input type="submit" class="btn btn-green" value="Test" />
                </form>
            </div>
            <div style="background-color: rgba(0, 0, 0, 0.4);padding: 30px;margin: 16px;border-radius: 12px;box-shadow: 0px 4px 12px -4px black;">
                <h3>Your application need these permissions</h3>
                <ul>
                    <li>GroupMember.Read.All</li>
                    <li>User.Read.All</li>
                </ul>
            </div>
        </div>
    </div>
    @if(isset($azureTest) && $azureTest)
        <div class="transparentsectionbox">
            <div style="display: flex;align-items:center;justify-content:center;flex-direction: column;padding: 16px;">
                <h1 id="finish" style="display: flex;align-items: center;margin: 0px;"><span class="material-symbols-outlined" style="padding: 10px;font-size: 60px">done_all</span>Last part of the setup process!</h1>
            </div>
        </div>
        <div class="sectionbox">
            <div style="display:flex;align-items: center;">
                <div style="display:flex;flex-wrap: wrap;justify-content: center;flex-direction:column">
                    <form style="width: 500px;display:flex;flex-direction: column;">
                        <label for="application_name">Application name</label>
                        <input type="text" name="application_name" />
                    </form>
                </div>
                <div style="background-color: rgba(0, 0, 0, 0.4);padding: 30px;margin: 16px;border-radius: 12px;box-shadow: 0px 4px 12px -4px black;">
                    <h3>If you leave the 'Application name' empty</h3>
                    <p>It will just keep "Kontoret" as the application name.</p>
                </div>
            </div>
            <button type="submit" class="btn btn-green" style="width: 80%;font-size: 28px;">Finish<span class="material-symbols-outlined" style="margin-left: 4px;">done_all</span></button>
        </div>
    @endif
@endsection