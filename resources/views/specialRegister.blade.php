@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Create Account</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('createUserFromAdmin')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="password_confirmation" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password-your-account" class="form-label">Password your acount for confirm:</label>
                                <input type="password" class="form-control" id="confirm-password-your-account" name="confirm-password-your-account" required>
                            </div>

                            <div class="mb-3">
                                <label for="account-type" class="form-label">Account Type</label>
                                <select class="form-select" id="account-type" name="account_type" required>
                                    <option value="" disabled selected>Select Account Type</option>
                                    <option value="receptionist">Receptionist</option>
                                    <option value="admin">Admin</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>

                            <div class="mb-3" id="employee-role-container" style="display: none;">
                                <label for="employee-role" class="form-label">Employee Role</label>
                                <select class="form-select" id="employee-role" name="employee_role">
                                    <option value="" disabled selected>Select Employee Role</option>
                                    <option value="manager">Manager</option>
                                    <option value="staff">Staff</option>
                                    <option value="intern">Intern</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <a href="#" class="text-decoration-none">Already have an account? Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accountTypeSelect = document.getElementById('account-type');
        const employeeRoleContainer = document.getElementById('employee-role-container');

        if (accountTypeSelect && accountTypeSelect.value === 'employee') {
            employeeRoleContainer.style.display = 'block';
        }

        if (accountTypeSelect) {
            accountTypeSelect.addEventListener('change', function () {
                if (this.value === 'employee') {
                    employeeRoleContainer.style.display = 'block';
                } else {
                    employeeRoleContainer.style.display = 'none';
                }
            });
        }
    });
</script>
@endsection
