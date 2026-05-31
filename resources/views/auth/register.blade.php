@extends('layouts.app')

@section('title', 'Employee System — Register')

@section('styles')
<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .card {
        background: rgba(255,255,255,0.65);
        backdrop-filter: blur(16px);
        border: 1px solid rgba(24,56,18,0.2);
        border-radius: 24px;
        padding: 36px 32px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 8px 40px rgba(24,56,18,0.1);
    }

    .logo { text-align: center; margin-bottom: 26px; }
    .logo h1 { font-size: 20px; font-weight: 800; color: #183812; }
    .logo p  { color: #777; font-size: 13px; margin-top: 3px; }

    .tabs {
        display: flex; background: rgba(24,56,18,0.06); border-radius: 12px;
        padding: 4px; margin-bottom: 22px; gap: 4px;
    }
    .tab {
        flex: 1; text-align: center; padding: 8px; border-radius: 9px;
        cursor: pointer; font-size: 14px; font-weight: 600; color: #777;
        border: none; background: none; transition: all 0.15s;
        text-decoration: none; display: block;
    }
    .tab.active {
        background: linear-gradient(135deg, #183812, #3a7a30);
        color: #fff; box-shadow: 0 2px 10px rgba(24,56,18,0.3);
    }

    .form-group { margin-bottom: 13px; }
    label {
        display: block; font-size: 12px; font-weight: 700; color: #444;
        margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.4px;
    }
    input, select {
        width: 100%; padding: 10px 13px;
        border: 1.5px solid rgba(24,56,18,0.2); border-radius: 10px;
        font-size: 14px; color: #1a1a1a; outline: none;
        transition: border 0.15s; background: rgba(255,255,255,0.8);
    }
    input:focus, select:focus { border-color: #183812; background: #fff; }
    input.err { border-color: #e53e3e; }

    .divider { height: 1px; background: rgba(24,56,18,0.1); margin: 14px 0; }

    .btn {
        width: 100%; padding: 11px;
        background: linear-gradient(135deg, #183812, #3a7a30);
        color: #fff; border: none; border-radius: 50px;
        font-size: 14px; font-weight: 700; cursor: pointer;
        margin-top: 4px; transition: opacity 0.15s;
        box-shadow: 0 4px 14px rgba(24,56,18,0.3);
    }
    .btn:hover { opacity: 0.88; }
</style>
@endsection

@section('content')
<div class="card">
    <div class="logo">
        <h1>Employee System</h1>
        <p>Create your account</p>
    </div>

    <div class="tabs">
        <a href="{{ route('login') }}"    class="tab">Login</a>
        <a href="{{ route('register') }}" class="tab active">Register</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">⚠️ {{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('register.post') }}" novalidate>
        @csrf
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" placeholder="Your full name"
                   value="{{ old('full_name') }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="you@example.com"
                   value="{{ old('email') }}"
                   class="{{ $errors->has('email') ? 'err' : '' }}" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Min. 6 characters" required minlength="6">
        </div>
        <div class="divider"></div>
        <div class="form-group">
            <label>Department</label>
            <select name="department">
                <option value="Engineering" {{ old('department')=='Engineering' ? 'selected':'' }}>Engineering</option>
                <option value="HR"          {{ old('department')=='HR'          ? 'selected':'' }}>HR</option>
                <option value="Finance"     {{ old('department')=='Finance'     ? 'selected':'' }}>Finance</option>
                <option value="Marketing"   {{ old('department')=='Marketing'   ? 'selected':'' }}>Marketing</option>
                <option value="Operations"  {{ old('department')=='Operations'  ? 'selected':'' }}>Operations</option>
            </select>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" placeholder="e.g. Developer"
                   value="{{ old('position') }}" required>
        </div>
        <button type="submit" class="btn">Create Account →</button>
    </form>
</div>
@endsection
