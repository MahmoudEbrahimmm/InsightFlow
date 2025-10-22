<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My Laravel App</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #111827, #1f2937, #000);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 {
            background: linear-gradient(to left, #34d399, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }
        .card-custom {
            background: rgba(17, 24, 39, 0.6);
            border: 1px solid #2d3748;
            border-radius: 1rem;
            backdrop-filter: blur(6px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>



    <div class="container text-center text-md-end">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-custom p-5">
                    <!-- العنوان -->
                    <h1 class="display-5 mb-4">أُنشئ أنظمة حماية متكاملة — كل شيء أَبنيه بيدي</h1>

                    <!-- الوصف -->
                    <p class="fs-5 mb-4 text-white">
                        مهندس نظم ومطور أُفضل الحلول المصممة يدويًا بدلاً من الاعتماد الكلي على الحزم الجاهزة.
                        أُطوّر نظم حماية قوية، أُحكم كل سطر كود، وأضمن أداءً آمنًا وموثوقًا يناسب متطلباتك الخاصة.
                    </p>

                    <!-- الأزرار -->
                    <div class="d-flex gap-3 justify-content-md-start justify-content-center">
                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-lg px-4">تسجيل الدخول</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-success btn-lg px-4">إنشاء حساب</a>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-outline-info btn-lg px-4">لوحة التحكم</a>

                    </div>
                </div>

                <!-- التذييل -->
                <p class="mt-4 text-white small text-center">
                    هل تريد عرض مشاريع سابقة أو توضيح خدمات الحماية؟ تواصل معي لعرض محفظة الأعمال.
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
