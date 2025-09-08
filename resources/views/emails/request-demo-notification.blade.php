<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Request Demo/Trial Baru - Kalapa Technology</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI",
                    Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
                line-height: 1.6;
                color: #333333;
                background-color: #f8f9fa;
            }

            .email-container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 40px 30px;
                text-align: center;
                color: white;
            }

            .logo {
                max-height: 60px;
                margin-bottom: 20px;
            }

            .header h1 {
                font-size: 28px;
                font-weight: 600;
                margin: 0;
            }

            .content {
                padding: 40px 30px;
            }

            .greeting {
                font-size: 18px;
                margin-bottom: 30px;
                color: #2c3e50;
            }

            .details-card {
                background-color: #f8f9fa;
                border-radius: 12px;
                padding: 30px;
                margin-bottom: 30px;
                border-left: 4px solid #667eea;
            }

            .details-title {
                font-size: 20px;
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
            }

            .details-title::before {
                content: "📋";
                margin-right: 10px;
                font-size: 24px;
            }

            .details-table {
                width: 100%;
                border-collapse: collapse;
            }

            .details-table tr {
                border-bottom: 1px solid #e9ecef;
            }

            .details-table tr:last-child {
                border-bottom: none;
            }

            .details-table th {
                text-align: left;
                padding: 15px 20px 15px 0;
                font-weight: 600;
                color: #495057;
                width: 35%;
                vertical-align: top;
            }

            .details-table td {
                padding: 15px 0;
                color: #2c3e50;
                font-weight: 500;
            }

            .footer {
                background-color: #2c3e50;
                padding: 40px 30px;
                color: white;
            }

            .footer-content {
                display: flex;
                align-items: flex-start;
                gap: 30px;
            }

            .footer-logo {
                flex-shrink: 0;
            }

            .footer-logo img {
                max-height: 50px;
                filter: brightness(0) invert(1);
            }

            .footer-info {
                flex: 1;
            }

            .company-name {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 15px;
                color: #ffffff;
            }

            .company-address {
                font-size: 14px;
                line-height: 1.6;
                color: #bdc3c7;
                margin-bottom: 20px;
            }

            .social-links {
                display: flex;
                gap: 15px;
                align-items: center;
            }

            .social-link {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                text-decoration: none;
                transition: transform 0.2s ease;
            }

            .social-link:hover {
                transform: translateY(-2px);
            }

            .social-facebook {
                background-color: #3b5998;
                color: white;
            }

            .social-instagram {
                background: linear-gradient(
                    45deg,
                    #f09433 0%,
                    #e6683c 25%,
                    #dc2743 50%,
                    #cc2366 75%,
                    #bc1888 100%
                );
                color: white;
            }

            .social-linkedin {
                background-color: #0077b5;
                color: white;
            }

            .social-tiktok {
                background-color: #000000;
                color: white;
            }

            .divider {
                height: 1px;
                background: linear-gradient(
                    90deg,
                    transparent,
                    #667eea,
                    transparent
                );
                margin: 30px 0;
            }

            @media (max-width: 600px) {
                .email-container {
                    margin: 0;
                    box-shadow: none;
                }

                .header,
                .content,
                .footer {
                    padding: 30px 20px;
                }

                .footer-content {
                    flex-direction: column;
                    gap: 20px;
                    text-align: center;
                }

                .details-table th {
                    width: 40%;
                }
            }
        </style>
    </head>
    <body>
        <div class="email-container">
            <!-- Header -->
            <div class="header">
                <img
                    src="url('assets/img/logo/logo-kalapatec.png')"
                    alt="Kalapa Technology"
                    class="logo"
                />
                <h1>Request Demo/Trial Baru</h1>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="greeting">
                    Halo Tim Kalapa Technology! 👋
                    <br /><br />
                    Anda telah menerima request demo/trial baru dari calon
                    klien. Berikut adalah detail lengkapnya:
                </div>

                <div class="details-card">
                    <div class="details-title">Detail Request Demo/Trial</div>

                    <table class="details-table">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $requestDemo->name }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $requestDemo->phone }}</td>
                        </tr>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <td>{{ $requestDemo->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Produk yang Diminta</th>
                            <td>
                                {{ $requestDemo->product_request ?? 'Tidak
                                disebutkan' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi Kebutuhan</th>
                            <td>{{ $requestDemo->description }}</td>
                        </tr>
                    </table>
                </div>

                <div class="divider"></div>

                <div style="text-align: center; margin: 30px 0">
                    <a
                        href="{{ url('/admin/demo-trial') }}"
                        style="
                            display: inline-block;
                            background: linear-gradient(
                                135deg,
                                #667eea 0%,
                                #764ba2 100%
                            );
                            color: white;
                            text-decoration: none;
                            padding: 15px 30px;
                            border-radius: 8px;
                            font-weight: 600;
                            font-size: 16px;
                            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
                            transition: transform 0.2s ease;
                        "
                    >
                        🔍 Lihat Detail di Admin Panel
                    </a>
                </div>

                <p style="color: #6c757d; font-size: 14px; text-align: center">
                    Silakan segera follow up dengan calon klien untuk memberikan
                    demo/trial yang sesuai dengan kebutuhan mereka.
                </p>
            </div>

            <!-- Footer -->
            <div class="footer">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img
                            src="url('assets/img/logo/logo-kalapatec.png')"
                            alt="Kalapa Technology"
                        />
                    </div>

                    <div class="footer-info">
                        <div class="company-name">PT Kalapa Technology</div>
                        <div class="company-address">
                            Menara Rajawali, Lt. 10, Kuningan, East Kuningan,
                            Setiabudi<br />
                            South Jakarta City, Jakarta 12950<br />
                            Email: bd.team@kalapatec.id | WhatsApp:
                            +6281299995925
                        </div>

                        <div class="social-links">
                            <a
                                href="https://facebook.com/kalapatec.id"
                                style="
                                    display: inline-block;
                                    width: 40px;
                                    height: 40px;
                                    background-color: #3b5998;
                                    color: white;
                                    text-decoration: none;
                                    border-radius: 50%;
                                    text-align: center;
                                    line-height: 37px;
                                    font-size: 18px;
                                "
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    style="vertical-align: middle"
                                >
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                    />
                                </svg>
                            </a>

                            <a
                                href="https://www.instagram.com/kalapatech.id/"
                                style="
                                    display: inline-block;
                                    width: 40px;
                                    height: 40px;
                                    background: linear-gradient(
                                        45deg,
                                        #f09433 0%,
                                        #e6683c 25%,
                                        #dc2743 50%,
                                        #cc2366 75%,
                                        #bc1888 100%
                                    );
                                    color: white;
                                    text-decoration: none;
                                    border-radius: 50%;
                                    text-align: center;
                                    line-height: 37px;
                                    font-size: 18px;
                                "
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    style="vertical-align: middle"
                                >
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                    />
                                </svg>
                            </a>

                            <a
                                href="https://www.linkedin.com/company/palapamitrasolusi"
                                style="
                                    display: inline-block;
                                    width: 40px;
                                    height: 40px;
                                    background-color: #0077b5;
                                    color: white;
                                    text-decoration: none;
                                    border-radius: 50%;
                                    text-align: center;
                                    line-height: 37px;
                                    font-size: 18px;
                                "
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    style="vertical-align: middle"
                                >
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                                    />
                                </svg>
                            </a>

                            <a
                                href="https://www.tiktok.com/@kalapatech"
                                style="
                                    display: inline-block;
                                    width: 40px;
                                    height: 40px;
                                    background-color: #000000;
                                    color: white;
                                    text-decoration: none;
                                    border-radius: 50%;
                                    text-align: center;
                                    line-height: 37px;
                                    font-size: 18px;
                                "
                            >
                                <svg
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="currentColor"
                                    style="vertical-align: middle"
                                >
                                    <path
                                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
