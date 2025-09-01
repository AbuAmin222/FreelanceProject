@extends('Dashboard.Pages.masterLightDash')
@section('content')
    <main class="page-content d-flex justify-content-center align-items-center"
        style="min-height: 90vh; background: #f9f9f9;">
        <section class="reset-section w-100" style="max-width: 600px;">
            <div class="card shadow-lg border-0 rounded-4 animate-card">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="reset-header text-center mb-4">
                        <div class="reset-icon mb-3">
                            <i class="fas fa-lock fa-3x text-primary"></i>
                        </div>
                        <h2 class="fw-bold" style="font-family: 'Cairo', sans-serif;">🔒 Reset Password</h2>
                        <p class="text-muted" style="font-family: 'Cairo', sans-serif;">Enter a secure new password for your
                            account</p>
                    </div>

                    <!-- Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-shake" style="font-family: 'Cairo', sans-serif;">
                            <h5 class="mb-2"><i class="fas fa-times-circle"></i> Errors Found</h5>
                            <strong>Password Error!</strong>
                            <p>Password must contain:</p>
                            <ul>
                                <li>At least 8 characters</li>
                                <li>At least one uppercase letter</li>
                                <li>At least one lowercase letter</li>
                                <li>At least one number</li>
                                <li>At least one special character (@$!%*?&)</li>
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form -->
                    <form id="resetForm" class="reset-form" method="POST"
                        action="{{ route($guard . '.resetPass.submit') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user_id }}">

                        <!-- Password Field -->
                        <div class="form-group mb-4 text-center">
                            <label class="fw-semibold d-block" style="font-family: 'Cairo', sans-serif; font-size: 1rem;">
                                <i class="fas fa-key"></i> كلمة المرور الجديدة
                            </label>
                            <div class="input-group rounded-pill overflow-hidden shadow-sm">
                                <input type="password" id="password" name="password"
                                    class="form-control border-0 px-3 text-center" placeholder="أدخل كلمة مرور جديدة"
                                    required style="font-family: 'Cairo', sans-serif; font-size: 1rem;">
                                <button type="button" class="btn btn-outline-secondary password-toggle"
                                    id="passwordToggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group mb-4 text-center">
                            <label class="fw-semibold d-block" style="font-family: 'Cairo', sans-serif; font-size: 1rem;">
                                <i class="fas fa-check"></i> تأكيد كلمة المرور
                            </label>
                            <div class="input-group rounded-pill overflow-hidden shadow-sm">
                                <input type="password" id="confirmPassword" name="confirmPassword"
                                    class="form-control border-0 px-3 text-center"
                                    placeholder="أعد إدخال كلمة المرور الجديدة" required
                                    style="font-family: 'Cairo', sans-serif; font-size: 1rem;">
                                <button type="button" class="btn btn-outline-secondary password-toggle"
                                    id="confirmPasswordToggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill hover-glow"
                                style="font-family: 'Cairo', sans-serif; font-weight: 600;">
                                <i class="fas fa-unlock"></i> Reset Password
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </section>
    </main>

    <!-- Custom Styles -->
    <style>
        /* Fade-in & Slide animation */
        .animate-card {
            animation: fadeSlideUp 0.7s ease;
        }

        @keyframes fadeSlideUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Error Shake */
        .alert-shake {
            animation: shake 0.4s;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20%,
            60% {
                transform: translateX(-8px);
            }

            40%,
            80% {
                transform: translateX(8px);
            }
        }

        /* Glow Hover for Buttons */
        .hover-glow:hover {
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.6);
            transform: translateY(-2px);
            transition: 0.3s;
        }

        /* Underline Hover for Links */
        .hover-underline {
            position: relative;
            text-decoration: none;
        }

        .hover-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -3px;
            left: 0;
            background: #0d6efd;
            transition: width 0.3s;
        }

        .hover-underline:hover::after {
            width: 100%;
        }

        /* Password Strength Colors */
        #passwordStrength.bg-danger {
            background-color: #dc3545 !important;
        }

        #passwordStrength.bg-warning {
            background-color: #ffc107 !important;
        }

        #passwordStrength.bg-success {
            background-color: #28a745 !important;
        }
    </style>

    <!-- Optional JS for effects -->
    <script>
        const passwordInput = document.getElementById("password");
        const strengthBar = document.getElementById("passwordStrength");
        const confirmPassword = document.getElementById("confirmPassword");
        const matchMsg = document.getElementById("passwordMatch");

        passwordInput.addEventListener("input", () => {
            const val = passwordInput.value;
            let strength = 0;
            if (val.length >= 8) strength++;
            if (/[A-Z]/.test(val)) strength++;
            if (/[0-9]/.test(val)) strength++;
            if (/[^A-Za-z0-9]/.test(val)) strength++;
            strengthBar.style.width = (strength * 25) + "%";
            strengthBar.className = "progress-bar";
            if (strength <= 1) strengthBar.classList.add("bg-danger");
            else if (strength === 2) strengthBar.classList.add("bg-warning");
            else strengthBar.classList.add("bg-success");
        });

        confirmPassword.addEventListener("input", () => {
            if (confirmPassword.value === passwordInput.value && passwordInput.value !== "") matchMsg.style
                .display = "block";
            else matchMsg.style.display = "none";
        });
    </script>

    <!-- Import Cairo font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
@endsection
