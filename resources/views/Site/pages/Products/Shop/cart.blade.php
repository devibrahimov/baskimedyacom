@extends('Site.index')



@section('content')
    <div class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <table class="table   table-bordered shopping-cart-wrap">
                            <thead class="text-muted">
                            <tr>
                                <th scope="col" width="">Ürün Bilgileri</th>
                                <th scope="col" width="100">Fiyatı</th>
                                <th scope="col" width="120">Ürün <br/> Sayı</th>
                                <th scope="col" width="100">Toplam Fiyat</th>
                                <th scope="col" width="120" class="text-right"> x </th>
                            </tr>
                            </thead>
                            <tbody>
                          @for($i =0 ; $i<=1; $i++)
                            <tr>
                                <td>
                                    <table class="table table-sm font-sm mb-0 mt-2">
                                        <tbody>
                                        <tr>
                                            <th class="compress text-nowrap">Vinil </th>
                                            <td colspan="2"> Çin 280gr   </td>
                                        </tr>
                                        <tr>
                                            <th>Ölçüler</th>
                                            <td class="p-0">
                                                <table class="table table-sm mb-0 font-sm text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>En</th>
                                                        <th>Boy</th>
                                                        <th>Alan</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-nowrap">300 cm</td>
                                                        <td class="text-nowrap">100 cm</td>
                                                        <td class="text-nowrap">

                                                            <span class="text-muted"><strong> 3 m<sup>2</sup></strong>   </span>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td ><strong class=" border-bottom border-dark">Ürün TL fiyatı</strong> </br><p>28.56 TL</p> </td>
                                        </tr>

                                        <tr>
                                            <th class="compress text-nowrap">Baskı</th>
                                            <td>İç Mekan Baskı (7.32 TL)</td>
                                            <td class="text-monospace text-right">21.96 TL</td>
                                        </tr>
                                        <tr>
                                            <th class="compress text-nowrap">Kopça</th>
                                            <td>Kopça ve Dikiş İstiyorum (0.00 TL)</td>
                                            <td class="text-monospace text-right">0.00 TL</td>
                                        </tr>
                                        <tr>
                                            <th class="compress text-nowrap">Kolon Dikişi</th>
                                            <td>Kolon Dikiş İstemiyorum (0.00 TL)</td>
                                            <td class="text-monospace text-right">0.00 TL</td>
                                        </tr>
                                        </tbody>

                                    </table>
                                   <span class=" text-monospace mt-1  text-sm-left">Ürün Sipariş Kodunuz  - PRVNL0021-CHN280</span>
                                </td>
                                <td > 23.54 <sup>₺</sup></td>
                                <td>
                                    <input type="number" name="" id="" value="1" class="form-control">
                                </td>
                                <td>
                                    <div class="price-wrap">
                                        <var class="price">₺ 145</var>
                                        <small class="text-muted">(USD5 each)</small>
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right  " >
                                     <a href="" class="btn btn-sm btn-outline-danger"> × Sil</a>
                                </td>
                            </tr>
                          @endfor
                            </tbody>




                            <tfoot>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td class="text-nowrap text-right">Toplam</td>
                                <td class="text-nowrap text-monospace text-right">252.60 TL</td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td class="text-nowrap text-right">KDV %18</td>
                                <td class="text-nowrap text-monospace text-right">45.45 TL</td>
                            </tr>
                            <tr class="bg-success text-white">
                                <td colspan="3"></td>
                                <td class="text-nowrap font-weight-bold text-right">Genel Toplam</td>
                                <td class="text-nowrap text-monospace text-right">298.05 TL</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!-- card.// -->
                </div>
            </div>




        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="heading_s1 mb-3">
                        <h6>Calculate Shipping</h6>
                    </div>
                    <form class="field_form shipping_calculator">
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <div class="custom_select">
                                    <input type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input required="required" placeholder="State / Country" class="form-control" name="name" type="text">
                            </div>
                            <div class="form-group col-lg-6">
                                <input required="required" placeholder="PostCode / ZIP" class="form-control" name="name" type="text">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <button class="btn btn-fill-line" type="submit">Update Totals</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">$349.00</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Total</td>
                                    <td class="cart_total_amount"><strong>$349.00</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection



@section('css')
    .param {
    margin-bottom: 7px;
    line-height: 1.4;
    }
    .param-inline dt {
    display: inline-block;
    }
    .param dt {
    margin: 0;
    margin-right: 7px;
    font-weight: 600;
    }
    .param-inline dd {
    vertical-align: baseline;
    display: inline-block;
    }

    .param dd {
    margin: 0;
    vertical-align: baseline;
    }

    .shopping-cart-wrap .price {
    color: #007bff;
    font-size: 18px;
    font-weight: bold;
    margin-right: 5px;
    display: block;
    }
    var {
    font-style: normal;
    }

    .media img {
    margin-right: 1rem;
    }
    .img-sm {
    width: 90px;
    max-height: 75px;
    object-fit: cover;
    }
@endsection

@section('js')
@endsection
