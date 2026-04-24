<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #0f172a;
            color: white;
        }

        .container {
            width: 90%;
            margin: auto;
        }

        .section {
            padding: 80px 0;
        }

        .hero {
            text-align: center;
            padding: 120px 0;
            background: linear-gradient(135deg, #1e293b, #0f172a);
        }

        .hero h1 {
            font-size: 48px;
        }

        .hero p {
            color: #94a3b8;
        }

        .btn {
            background: #22c55e;
            padding: 10px 20px;
            display: inline-block;
            margin-top: 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .about img {
            width: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: #1e293b;
            padding: 20px;
            border-radius: 10px;
        }

        .card img {
            width: 100%;
            border-radius: 10px;
        }

        .contact-links a {
            display: inline-block;
            margin: 10px;
            color: #22c55e;
            text-decoration: none;
        }
    </style>
</head>
<body>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <h1>{{ $hero->headline ?? 'Welcome to My Portfolio' }}</h1>
        <p>{{ $hero->subheadline ?? 'I am a developer' }}</p>

        @if($hero && $hero->cta_text)
            <a href="#contact" class="btn">{{ $hero->cta_text }}</a>
        @endif
    </div>
</section>

<!-- ABOUT -->
<section class="section about">
    <div class="container" style="text-align:center;">
        @if($about && $about->photo)
            <img src="{{ asset('storage/'.$about->photo) }}">
        @endif

        <h2>{{ $about->name ?? 'Your Name' }}</h2>
        <p>{{ $about->bio ?? 'Your bio here...' }}</p>

        <p>
            📧 {{ $about->email ?? '-' }} <br>
            📱 {{ $about->whatsapp ?? '-' }} <br>
            💻 {{ $about->github ?? '-' }}
        </p>
    </div>
</section>

<!-- PORTFOLIO -->
<section class="section">
    <div class="container">
        <h2>My Projects</h2>

        <div class="portfolio-grid">
            @foreach($portfolios as $item)
                <div class="card">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}">
                    @endif

                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>

                    @if($item->link)
                        <a href="{{ $item->link }}" target="_blank" class="btn">View</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="section" id="contact">
    <div class="container">
        <h2>Contact Me</h2>

        @if(session('success'))
            <div style="background:green;padding:10px;margin-bottom:10px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Nama" style="width:100%;padding:10px;margin-bottom:10px;">
            <input type="email" name="email" placeholder="Email" style="width:100%;padding:10px;margin-bottom:10px;">
            <textarea name="message" placeholder="Pesan" style="width:100%;padding:10px;margin-bottom:10px;"></textarea>

            <button class="btn">Kirim</button>
        </form>

        <hr style="margin:40px 0;">

        <!-- 🔥 DATA DARI CONTACT (ADMIN) -->
        <h3>Atau hubungi langsung:</h3>

        <div class="contact-links">

            @if($contact && $contact->email)
                <a href="mailto:{{ $contact->email }}">📧 Email</a>
            @endif

            @if($contact && $contact->whatsapp)
                <a href="https://wa.me/{{ $contact->whatsapp }}" target="_blank">📱 WhatsApp</a>
            @endif

            @if($contact && $contact->github)
                <a href="{{ $contact->github }}" target="_blank">💻 Github</a>
            @endif

            @if($contact && $contact->instagram)
                <a href="https://instagram.com/{{ $contact->instagram }}" target="_blank">📸 Instagram</a>
            @endif

        </div>

    </div>
</section>

</body>
</html>