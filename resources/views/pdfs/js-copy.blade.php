<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    <style>
        body, .label, .value {
            font-family: Arial, Verdana;
        }

        .label {
            font-weight: bold;
            margin-top: 5px;
            font-size: 1em;
            color: #333;
        }

        td.px-6 {
            border: 1px solid;
        }

        table {
            border-collapse: collapse;
        }

        .value {
            margin-bottom: 15px;
            font-size: 1.0em;
            padding-left: 5px;
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
    </style>
</head>
<body>
<table align="center"
       style="background-color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:12px; border:1px solid #006; color:#000;"
       width="650">
    <tbody>
    <tr>
        <td align="center" style="padding:10px;" valign="top" colspan="100%">
            <img src="https://just2canada.ca/images/logo.png"/></td>
        </td>
    </tr>
    <tr>
        <td style="background-color:#ececec;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000;padding:7px 0 6px 13px;text-transform:uppercase;border:1px solid #ececec;border-bottom:0px"
            height="20" colspan="100%">Detail:
        </td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Your Client ID</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->client_id}}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Full Name</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['full_name'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Short Name</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['short_name'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Citizen of</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['citizen'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Currently Residing in</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['current_residence'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Email</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['email'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Phone</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['phone'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Current Occupation</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['current_occupation'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Years of experience</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['current_years_of_experience'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>In Country</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['country'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Previous Occupation</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['previous_occupation'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Previous Years of Experience</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['previous_years_of_experience'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Taken IELTS / CELPIP English proficiency test?</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['taken_proficiency_test'] }}</td>
    </tr>
    @if($data->form_data['taken_proficiency_test'] == 'Yes')
        <tr>
            <td style="padding-left:10px" width="40%" height="20"><b>Score Card</b></td>
            <td width="5%">:</td>
            <td width="65%"><a class="text-blue-600" href="{{ Storage::url($data->form_data['score_card']) }}" target="_blank">Download</a></td>
        </tr>
    @else
        <tr>
            <td style="padding-left:10px" width="40%" height="20"><b>English language proficiency</b></td>
            <td width="5%">:</td>
            <td width="65%">{{ $data->form_data['rate_english'] }}</td>
        </tr>
    @endif
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Obtained Education Credentials Assessment (ECA) for Canada?</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['obtained_eca'] }}</td>
    </tr>
    @if($data->form_data['obtained_eca'] == 'Yes')
        <tr>
            <td style="padding-left:10px" width="40%" height="20"><b>ECA Report</b></td>
            <td width="5%">:</td>
            <td width="65%"><a class="text-blue-600" href="{{ Storage::url($data->form_data['eca_report']) }}" target="_blank">Download</a></td>
        </tr>
    @endif
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Which countries have you served in</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['countries_served'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>How did you obtain our reference?</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['reference'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Describe in 100 words</b></td>
        <td width="5%">:</td>
        <td width="65%">{{ $data->form_data['describe'] }}</td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Picture</b></td>
        <td width="5%">:</td>
        <td width="65%"><img src="{{ Storage::url($data->form_data['profile_pic']) }}"/></td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Resume</b></td>
        <td width="5%">:</td>
        <td width="65%"><a class="text-blue-600" href="{{ Storage::url($data->form_data['resume']) }}" target="_blank">Download</a></td>
    </tr>
    <tr>
        <td style="padding-left:10px" width="40%" height="20"><b>Introduction video</b></td>
        <td width="5%">:</td>
        <td width="65%"><a class="text-blue-600" href="{{ Storage::url($data->form_data['intro_video']) }}" target="_blank">Download</a></td>
    </tr>
    </tbody>
</table>
</body>
</html>
