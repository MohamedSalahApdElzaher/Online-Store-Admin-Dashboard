@extends('admin.admin_master')

@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <div class="row" style="margin: 10px;">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Manage Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Product En</th>
                                        <th>Product Ar</th>
                                        <th>Product Price </th>
                                        <th>Quantity</th>
                                        <th>Discount </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $cat)
                                        <tr>
                                            <td><img src="{{ asset($cat->thambnail) }}" style="hight:50px;width: 50px">
                                            </td>
                                            <td>{{ $cat->product_name_en }}</td>
                                            <td>{{ $cat->product_name_ar }}</td>
                                            <td>{{ $cat->selling_price }} $</td>
                                            <td>{{ $cat->quantity }}</td>
                                            <td>
                                                @if ($cat->discount_price == null)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>
                                                @else
                                                    @php
                                                        $amount = $cat->selling_price - $cat->discount_price;
                                                        $discount = ($amount / $cat->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount) }}
                                                        %</span>
                                                @endif



                                            </td>
                                            <td>
                                                @if ($cat->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                                @endif

                                            </td>

                                            <td width="30%">

                                                <a href="{{ url('product/update/view/' . $cat->id) }}"
                                                    class="btn btn-warning" title='Edit Data'><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ url('product/delete/' . $cat->id) }}" class="btn btn-danger"
                                                    id="delete" title='Delete Data'><i class="fa fa-trash"></i></a>


                                                @if ($cat->status == 1)
                                                    <a href="{{ route('product.inactive', $cat->id) }}"
                                                        class="btn btn-danger" title="Inactive Now"><i
                                                            class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('product.active', $cat->id) }}"
                                                        class="btn btn-success" title="Active Now"><i
                                                            class="fa fa-arrow-up"></i> </a>
                                                @endif




                                            </td>



                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

           

        </div>
    </div>
    </div>
@endsection
