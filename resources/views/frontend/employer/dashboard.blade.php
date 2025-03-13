<x-layouts.frontend>
    <section id="aboutus" class="about_us_area   row">
        <div class="container">
            <div class="row about_row" style="padding-top:0;">
                We have received your application form. A copy of the form is sent to your mail as well. We will contact you soon.
                <form action="{{route('employer.logout')}}" method="POST">
                    @csrf
                    <input type="submit" value="Logout" class="btn">
                </form>
            </div>
        </div>
    </section>
</x-layouts.frontend>
