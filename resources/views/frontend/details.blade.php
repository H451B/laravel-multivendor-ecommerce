<x-frontend.layouts.details_page>
    <!--start container-->
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <x-frontend.details.product_details :product="$product"/>

            <!--START sitebar-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <!-- Categories widget-->
                <x-frontend.details.sitebar_widget />

                <!--- Popular Porudct -->
                <x-frontend.details.sitebar_popular />

            </div>
            <!--END sitebar-->

            <!--- Related Porudct -->
            <x-frontend.details.related_product />


        </div><!--end row-->

    </div>
    <!--end container-->

</x-frontend.layouts.details_page>