@extends('layout.user')

@section('container')
<div class="container-fluid bg-breadcrumb"style = "background-image : url('{{ URL::asset('Template/img/bg1.png')}}');;" >
                                           
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4">Lokasi </h3>
        <ol class="breadcrumb justify-content-center mb-0">
        </ol>    
    </div>
</div>
    <!-- Contact Start -->
    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            
                <div class="col-12">
                    <div class="rounded">
                        <iframe class="w-100" 
                        style="height: 450px; border-radius: 5%; " src ="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4180.20435865153!2d98.77210289370609!3d1.7410976836290395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302ef5a2cdd25e5b%3A0x5adbd1e14a705751!2sGBI%20Jemaat%20VICTORY%2C%20Sibolga%20Kota!5e0!3m2!1sid!2sid!4v1772803511740!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">"></iframe>
                    </div>
                </div>

            <div class="row g-5 align-items-center">
                <div class="col-lg-15">
                    <div class="bg-white rounded p-4">
                        <div class="text-center mb-4">
                            <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                            <h4 class="text-primary"><Address></Address></h4>
                            <p class="mb-0"> Jl. Com.Yos Sudarso No.35, Kota Beringin, Sibolga Kota, Kota Sibolga, Sumatera Utara 22513</p>
                        </div>
                        <div class="text-center mb-4">
                            <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Ponsel</h4>
                            <p class="mb-0">082366897979</p>
                        </div>
                       
                        <div class="text-center">
                            <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Email</h4>
                            <p class="mb-0">EMAILEXAMPLE@gmail.com</p>
                        </div>
                        
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection