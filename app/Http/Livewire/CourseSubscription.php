<?php

namespace App\Http\Livewire;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Course;
use App\Models\Subscription;
use Auth;
use DB;
use App\Events\NewCourseSubscription;


use Livewire\Component;

class CourseSubscription extends Component
{
    use AuthorizesRequests;

    public $course_id;
    public function render()
    {
        return view('livewire.course-subscription');
    }

    public function addSub()
    {
        $user_id = Auth::user()->id;
        $result = DB::table('subscriptions as s')
                    ->where('s.user_id',$user_id)
                    ->where('s.subscriptionable_id',$this->course_id)
                    ->where('s.subscriptionable_type','App\Models\Course')
                    ->where('s.status',0)
                    ->count();
        if ($result == 0) {
            $course = Course::findOrFail($this->course_id);

            $sub = new Subscription;
    
            $sub->user_id = $user_id;
            $sub->price = $course->price;
            $course->subscriptions()->save($sub);
            $this->dispatchBrowserEvent('swal',[
                'type' => 'success',
                'title' => 'Thank you For subscriping to this courese an email has been sent to your email',
                'text' => '',
            ]);
            event(new NewCourseSubscription($sub));
        }else {
            $this->dispatchBrowserEvent('swal',[
                'type' => 'error',
                'title' => 'You Allready subscriped to this course',
                'text' => '',
            ]);
        }
        

        
    }
}
