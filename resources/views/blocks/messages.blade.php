
@if(session('success'))
    <div class="success-mess">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="error-mess">{{ session('error') }}</div>
@endif

<script>

    setTimeout(function () {
        $('.success-mess').hide()
    },2000)
</script>
