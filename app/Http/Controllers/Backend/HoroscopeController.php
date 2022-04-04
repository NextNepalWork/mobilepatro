<?php

namespace App\Http\Controllers\Backend;

use App\MOdels\Backend\DailyHoro;
use App\Models\Backend\Horoscopes;
use App\Models\Backend\MonthlyHoro;
use App\Models\Backend\WeeklyHoro;
use App\Models\Backend\YearlyHoro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HoroscopeController extends BackendController
{
    public function add_horo()
    {
        $this->data('title', $this->setTitle('Add-Horoscope-Daily'));
        return view($this->backendPath . 'add_horo', $this->data);
    }

    public function save_daily(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'date' => 'required|unique:horoscopes,date',
                'aries' => 'required|min:5',
                'taurus' => 'required|min:5',
                'gemini' => 'required|min:5',
                'cancer' => 'required|min:5',
                'leo' => 'required|min:5',
                'virgo' => 'required|min:5',
                'libra' => 'required|min:5',
                'scorpio' => 'required|min:5',
                'sagittarius' => 'required|min:5',
                'capricorn' => 'required|min:5',
                'aquarius' => 'required|min:5',
                'pisces' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );

            $data['date'] = $request->date;
            $data['aries'] = $request->aries;
            $data['taurus'] = $request->taurus;
            $data['gemini'] = $request->gemini;
            $data['cancer'] = $request->cancer;
            $data['leo'] = $request->leo;
            $data['virgo'] = $request->virgo;
            $data['libra'] = $request->libra;
            $data['scorpio'] = $request->scorpio;
            $data['sagittarius'] = $request->sagittarius;
            $data['capricorn'] = $request->capricorn;
            $data['aquarius'] = $request->aquarius;
            $data['pisces'] = $request->pisces;


            if (Horoscopes::create($data)) {
                Session::flash('success', 'Your Daily Horoscope for ' . $request->date . ' has been posted');
                return redirect()->route('show-horo-daily');
            }

        }
    }

    public function save_weekly(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'daterange' => 'required|unique:weekly_horos,date',
                'ariesw' => 'required|min:5',
                'taurusw' => 'required|min:5',
                'geminiw' => 'required|min:5',
                'cancerw' => 'required|min:5',
                'leow' => 'required|min:5',
                'virgow' => 'required|min:5',
                'libraw' => 'required|min:5',
                'scorpiow' => 'required|min:5',
                'sagittariusw' => 'required|min:5',
                'capricornw' => 'required|min:5',
                'aquariusw' => 'required|min:5',
                'piscesw' => 'required|min:5'
            ],
                ['daterange.unique' => 'You have already inserted for this date'],
                ['daterange.required' => 'Please give a dates']
            );
            $data['date'] = $request->daterange;
            $data['aries'] = $request->ariesw;
            $data['taurus'] = $request->taurusw;
            $data['gemini'] = $request->geminiw;
            $data['cancer'] = $request->cancerw;
            $data['leo'] = $request->leow;
            $data['virgo'] = $request->virgow;
            $data['libra'] = $request->libraw;
            $data['scorpio'] = $request->scorpiow;
            $data['sagittarius'] = $request->sagittariusw;
            $data['capricorn'] = $request->capricornw;
            $data['aquarius'] = $request->aquariusw;
            $data['pisces'] = $request->piscesw;


            if (WeeklyHoro::create($data)) {
                Session::flash('success', 'Your Weekly Horoscope from ' . $request->daterange . ' has been posted');
                return redirect()->route('show-horo-weekly');
            }

        }
    }

    public function save_monthly(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'date' => 'required|unique:monthly_horos,date',
                'ariesm' => 'required|min:5',
                'taurusm' => 'required|min:5',
                'geminim' => 'required|min:5',
                'cancerm' => 'required|min:5',
                'leom' => 'required|min:5',
                'virgom' => 'required|min:5',
                'libram' => 'required|min:5',
                'scorpiom' => 'required|min:5',
                'sagittariusm' => 'required|min:5',
                'capricornm' => 'required|min:5',
                'aquariusm' => 'required|min:5',
                'piscesm' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );
            $data['date'] = $request->date;
            $data['aries'] = $request->ariesm;
            $data['taurus'] = $request->taurusm;
            $data['gemini'] = $request->geminim;
            $data['cancer'] = $request->cancerm;
            $data['leo'] = $request->leom;
            $data['virgo'] = $request->virgom;
            $data['libra'] = $request->libram;
            $data['scorpio'] = $request->scorpiom;
            $data['sagittarius'] = $request->sagittariusm;
            $data['capricorn'] = $request->capricornm;
            $data['aquarius'] = $request->aquariusm;
            $data['pisces'] = $request->piscesm;


            if (MonthlyHoro::create($data)) {
                Session::flash('success', 'Your Monthly Horoscope for ' . $request->date . ' has been posted');
                return redirect()->route('show-horo-monthly');
            }

        }
    }

    public function save_yearly(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'date' => 'required|unique:yearly_horos,date',
                'ariesy' => 'required|min:5',
                'taurusy' => 'required|min:5',
                'geminiy' => 'required|min:5',
                'cancery' => 'required|min:5',
                'leoy' => 'required|min:5',
                'virgoy' => 'required|min:5',
                'libray' => 'required|min:5',
                'scorpioy' => 'required|min:5',
                'sagittariusy' => 'required|min:5',
                'capricorny' => 'required|min:5',
                'aquariusy' => 'required|min:5',
                'piscesy' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );
            $data['date'] = $request->date;
            $data['aries'] = $request->ariesy;
            $data['taurus'] = $request->taurusy;
            $data['gemini'] = $request->geminiy;
            $data['cancer'] = $request->cancery;
            $data['leo'] = $request->leoy;
            $data['virgo'] = $request->virgoy;
            $data['libra'] = $request->libray;
            $data['scorpio'] = $request->scorpioy;
            $data['sagittarius'] = $request->sagittariusy;
            $data['capricorn'] = $request->capricorny;
            $data['aquarius'] = $request->aquariusy;
            $data['pisces'] = $request->piscesy;


            if (YearlyHoro::create($data)) {
                Session::flash('success', 'Your Yearly Horoscope for ' . $request->date . ' has been posted');
                return redirect()->route('show-horo-yearly');
            }

        }
    }

    public function show_horo_daily(Request $request)
    {
        if ($request->isMethod('get')) {

            $horodata = Horoscopes::orderby('id', 'desc')->paginate(12);
            $this->data('horodata', $horodata);
            $this->data('title', $this->setTitle('Daily-Horoscope'));
            return view($this->backendPath . 'show_horo_daily', $this->data);
        }
    }

    public function edit($id)
    {
        $horodata = Horoscopes::where('id', '=', $id)->first();
        return view($this->backendPath . 'edit', compact('horodata'));
    }

    public function edit_w($id)
    {
        $horodata = WeeklyHoro::where('id', '=', $id)->first();
        return view($this->backendPath . 'editweeklymodal', compact('horodata'));
    }

    public function edit_m($id)
    {
        $horodata = MonthlyHoro::where('id', '=', $id)->first();
        return view($this->backendPath . 'editmonthlymodal', compact('horodata'));
    }

    public function edit_y($id)
    {
        $horodata = YearlyHoro::where('id', '=', $id)->first();
        return view($this->backendPath . 'edityearlymodal', compact('horodata'));
    }

    public function show_horo_weekly(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Weekly-Horoscope'));
            $weekly = WeeklyHoro::orderby('id', 'desc')->paginate(12);
            $this->data('weekly', $weekly);
            return view($this->backendPath . 'show_horo_weekly', $this->data);
        }
    }

    public function show_horo_monthly(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Monthly-Horoscope'));
            $monthly = MonthlyHoro::orderby('id', 'desc')->paginate(12);
            $this->data('monthly', $monthly);
            return view($this->backendPath . 'show_horo_monthly', $this->data);
        }
    }

    public function show_horo_yearly(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Yearly-Horoscope'));
            $yearly = YearlyHoro::orderby('id', 'desc')->paginate(12);
            $this->data('yearly', $yearly);
            return view($this->backendPath . 'show_horo_yearly', $this->data);
        }

    }

    public function delete_horo_daily(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $daily = Horoscopes::findorfail($id);
            if ($daily->delete()) {
                Session::flash('success', 'Daily horoscope for ' . $daily->date . ' has been deleted');
                return redirect()->back();
            }
        }
    }

    public function delete_horo_weekly(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $weekly = WeeklyHoro::findorfail($id);
            if ($weekly->delete()) {
                Session::flash('success', 'Weekly horoscope for ' . $weekly->date . '  been deleted');
                return redirect()->back();
            }
        }
    }

    public function delete_horo_monthly(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $monthly = MonthlyHoro::findorfail($id);
            if ($monthly->delete()) {
                Session::flash('success', 'Monthly horoscope for ' . $monthly->date . ' has been deleted');
                return redirect()->back();
            }
        }
    }

    public function delete_horo_yearly(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $yearly = YearlyHoro::findorfail($id);
            if ($yearly->delete()) {
                Session::flash('success', 'Yearly horoscope for ' . $yearly->date . ' has been deleted');
                return redirect()->back();
            }
        }
    }

    public function edit_horo_daily(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $horo = Horoscopes::findorfail($id);
            $this->data('horo', $horo);
            $this->data('title', $this->setTitle('Edit-Horo-Daily'));

            return view($this->backendPath . 'edit_horo_daily', $this->data);
        }
    }

    public function edit_horo_daily_action(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'date' => 'required|unique:horoscopes,date,' . $request->id,
                'aries' => 'required|min:5',
                'taurus' => 'required|min:5',
                'gemini' => 'required|min:5',
                'cancer' => 'required|min:5',
                'leo' => 'required|min:5',
                'virgo' => 'required|min:5',
                'libra' => 'required|min:5',
                'scorpio' => 'required|min:5',
                'sagittarius' => 'required|min:5',
                'capricorn' => 'required|min:5',
                'aquarius' => 'required|min:5',
                'pisces' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );
            $data['date'] = $request->date;
            $data['aries'] = $request->aries;
            $data['taurus'] = $request->taurus;
            $data['gemini'] = $request->gemini;
            $data['cancer'] = $request->cancer;
            $data['leo'] = $request->leo;
            $data['virgo'] = $request->virgo;
            $data['libra'] = $request->libra;
            $data['scorpio'] = $request->scorpio;
            $data['sagittarius'] = $request->sagittarius;
            $data['capricorn'] = $request->capricorn;
            $data['aquarius'] = $request->aquarius;
            $data['pisces'] = $request->pisces;

            $id = $request->id;
            $update = Horoscopes::findorfail($id);
            if ($update->update($data)) {
                Session::flash('success', 'Daily Horoscope Updated');
                return redirect()->route('show-horo-daily');

            }

        }
    }

    public function edit_horo_weekly(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $horo = WeeklyHoro::findorfail($id);
            $this->data('horo', $horo);
            $this->data('title', $this->setTitle('Edit-Horo-Weekly'));

            return view($this->backendPath . 'edit_horo_weekly', $this->data);
        }
    }

    public function edit_horo_weekly_action(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'daterange' => 'required|unique:weekly_horos,date,' . $request->id,
                'aries' => 'required|min:5',
                'taurus' => 'required|min:5',
                'gemini' => 'required|min:5',
                'cancer' => 'required|min:5',
                'leo' => 'required|min:5',
                'virgo' => 'required|min:5',
                'libra' => 'required|min:5',
                'scorpio' => 'required|min:5',
                'sagittarius' => 'required|min:5',
                'capricorn' => 'required|min:5',
                'aquarius' => 'required|min:5',
                'pisces' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );
            $data['date'] = $request->daterange;
            $data['aries'] = $request->aries;
            $data['taurus'] = $request->taurus;
            $data['gemini'] = $request->gemini;
            $data['cancer'] = $request->cancer;
            $data['leo'] = $request->leo;
            $data['virgo'] = $request->virgo;
            $data['libra'] = $request->libra;
            $data['scorpio'] = $request->scorpio;
            $data['sagittarius'] = $request->sagittarius;
            $data['capricorn'] = $request->capricorn;
            $data['aquarius'] = $request->aquarius;
            $data['pisces'] = $request->pisces;

            $id = $request->id;
            $update = WeeklyHoro::findorfail($id);
            if ($update->update($data)) {
                Session::flash('success', 'Weekly Horoscope Updated');
                return redirect()->route('show-horo-weekly');

            }

        }
    }

    public function edit_horo_monthly(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $horo = MonthlyHoro::findorfail($id);
            $this->data('horo', $horo);
            $this->data('title', $this->setTitle('Edit-Horo-Monthly'));

            return view($this->backendPath . 'edit_horo_monthly', $this->data);
        }
    }

    public function edit_horo_monthly_action(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'date' => 'required|unique:monthly_horos,date,' . $request->id,
                'aries' => 'required|min:5',
                'taurus' => 'required|min:5',
                'gemini' => 'required|min:5',
                'cancer' => 'required|min:5',
                'leo' => 'required|min:5',
                'virgo' => 'required|min:5',
                'libra' => 'required|min:5',
                'scorpio' => 'required|min:5',
                'sagittarius' => 'required|min:5',
                'capricorn' => 'required|min:5',
                'aquarius' => 'required|min:5',
                'pisces' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );
            $data['date'] = $request->date;
            $data['aries'] = $request->aries;
            $data['taurus'] = $request->taurus;
            $data['gemini'] = $request->gemini;
            $data['cancer'] = $request->cancer;
            $data['leo'] = $request->leo;
            $data['virgo'] = $request->virgo;
            $data['libra'] = $request->libra;
            $data['scorpio'] = $request->scorpio;
            $data['sagittarius'] = $request->sagittarius;
            $data['capricorn'] = $request->capricorn;
            $data['aquarius'] = $request->aquarius;
            $data['pisces'] = $request->pisces;

            $id = $request->id;
            $update = MonthlyHoro::findorfail($id);
            if ($update->update($data)) {
                Session::flash('success', 'Monthly Horoscope Updated');
                return redirect()->route('show-horo-monthly');

            }

        }
    }

    public function edit_horo_yearly(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $horo = YearlyHoro::findorfail($id);
            $this->data('horo', $horo);
            $this->data('title', $this->setTitle('Edit-Horo-Yearly'));

            return view($this->backendPath . 'edit_horo_yearly', $this->data);
        }
    }

    public function edit_horo_yearly_action(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'date' => 'required|unique:yearly_horos,date,' . $request->id,
                'aries' => 'required|min:5',
                'taurus' => 'required|min:5',
                'gemini' => 'required|min:5',
                'cancer' => 'required|min:5',
                'leo' => 'required|min:5',
                'virgo' => 'required|min:5',
                'libra' => 'required|min:5',
                'scorpio' => 'required|min:5',
                'sagittarius' => 'required|min:5',
                'capricorn' => 'required|min:5',
                'aquarius' => 'required|min:5',
                'pisces' => 'required|min:5'
            ],
                ['date.unique' => 'You have already inserted for this date'],
                ['date.required' => 'Please give a dates']
            );
            $data['date'] = $request->date;
            $data['aries'] = $request->aries;
            $data['taurus'] = $request->taurus;
            $data['gemini'] = $request->gemini;
            $data['cancer'] = $request->cancer;
            $data['leo'] = $request->leo;
            $data['virgo'] = $request->virgo;
            $data['libra'] = $request->libra;
            $data['scorpio'] = $request->scorpio;
            $data['sagittarius'] = $request->sagittarius;
            $data['capricorn'] = $request->capricorn;
            $data['aquarius'] = $request->aquarius;
            $data['pisces'] = $request->pisces;

            $id = $request->id;
            $update = YearlyHoro::findorfail($id);
            if ($update->update($data)) {
                Session::flash('success', 'Yearly Horoscope Updated');
                return redirect()->route('show-horo-yearly');

            }

        }
    }

}
