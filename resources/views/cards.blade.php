@extends('layouts.app')

@section('content')








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

<div class="container">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">العدد <span class="text-muted fw-normal ms-2">(<?php  echo count($data); ?>)</span></h5>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            

                        </li>
                        <li class="nav-item">
                        </li>
                    </ul>
                </div>
                <div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="@mdo" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" ><i class="bx bx-plus me-1"></i> Add New</button>
                </div>
                <div class="dropdown">
                    <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('branchesTrashed')}}">المحذوفات </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
       
@foreach ($data as $item)
    

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Edit</a>
                            <form action="{{ route('branch.delete', $item['id'])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger dropdown-item" type="submit">Delete</button>
                              </form>
                    </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="flex-1 ms-3">
                            <h5 class="font-size-16  " ><a href="#" class="text-dark">{{$item['name']}}</a></h5>
                        </div>
                    </div>
                    <div class="mt-3 pt-1">
                        <p class="text-muted mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i> {{$item['phone']}}</p>
                        <p class="text-muted mb-0 mt-2"><i class="mdi  mdi-account-circle font-size-15 align-middle pe-2 text-primary"></i> {{$item['manegere']}}</p>
                    </div>
                    <div class="d-flex gap-2 pt-4">
                        <button type="button" class="btn btn-primary btn-sm w-50"><i class="bx bx-message-square-dots me-1"></i> Contact</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        

    </div>
    <div class="row g-0 align-items-center pb-4">



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> جديد</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="{{route('branch.add')}}">
                @csrf
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">اسم الفرع:</label>
                  <input type="text" class="form-control"  name="name" id="recipient-name">
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label"> مدير الفرع:</label>
                    <input type="text" class="form-control" name="manegere" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label"> رقم الهاتف:</label>
                    <input type="text" class="form-control"  name="phone" id="recipient-name">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">اضافة </button>
                  </div>
              </form>
            </div>
           
          </div>
        </div>
      </div>

</div>






    <style type="text/css">
        body{margin-top:20px;
        background-color:#eee;
        }
        .card {
            margin-bottom: 24px;
            box-shadow: 0 2px 3px #e4e8f0;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }
        .avatar-md {
            height: 4rem;
            width: 4rem;
        }
        .rounded-circle {
            border-radius: 50%!important;
        }
        .img-thumbnail {
            padding: 0.25rem;
            background-color: #f1f3f7;
            border: 1px solid #eff0f2;
            border-radius: 0.75rem;
        }
        .avatar-title {
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: flex;
            font-weight: 500;
            height: 100%;
            justify-content: center;
            width: 100%;
        }
        .bg-soft-primary {
            background-color: rgba(59,118,225,.25)!important;
        }
        a {
            text-decoration: none!important;
        }
        .badge-soft-danger {
            color: #f56e6e !important;
            background-color: rgba(245,110,110,.1);
        }
        .badge-soft-success {
            color: #63ad6f !important;
            background-color: rgba(99,173,111,.1);
        }
        .mb-0 {
            margin-bottom: 0!important;
        }
        .badge {
            display: inline-block;
            padding: 0.25em 0.6em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.75rem;
        }
        
        </style>
        
        
        
        










@endsection