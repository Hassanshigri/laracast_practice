<h2>{{$job->title}}</h2>

<div>
    <p>Congrates your job is now live on our website</p>
    <p><a href="{{url('/jobs/' . $job->id)}}">View Your job</a></p>
</div>
