<x-layouts.frontend>
    <section id="aboutus" class="about_us_area   row">
        <div class="container">
            <div class="row about_row d-flex justify-center items-center" style="padding-top:0;">
                <div class="col text-center">
                    Your email is not verified yet. A verification email has been sent your email address. Click on the link in the email to verify your email. If the email is not received yet, click on the button below to send the email again
                    <div class="d-flex justify-content-center">
                        <a href="{{route('verification.send')}}" class="btn">Resend Email</a>
                        <form action="{{route('employer.logout')}}" method="POST" style="margin-left: 20px;">
                            @csrf
                            <input type="submit" value="Logout" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
