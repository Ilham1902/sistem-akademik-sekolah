@extends('layouts.main')

@section('body')
    <h3>Info Account</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-body mt-3">

            <table class="table table-responsive ms-4">

                <tr>
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td>{{ Auth::user()->username }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td><strong>Role</strong></td>
                    <td>:</td>
                    <td>{{ Auth::user()->level }}</td>
                </tr>

            </table>

        </div>

    </div>
@endsection
