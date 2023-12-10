@include('client.header.header1')
<link rel="stylesheet" href="/css/client/index.css" />
@include('client.header.header2')

<section class="container">
    <style>
        .maincontent {
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="maincontent" id="id-content">
        <h3> Đơn hàng của bạn đang chờ xác nhận hehe</h3>
    </div>
</section>

@include('client.footer.footer')