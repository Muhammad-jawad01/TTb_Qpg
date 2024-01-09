<?php

use Illuminate\Http\Exceptions\HttpResponseException;


function getPert($total, $current)
{
    if ($total == 0) {
        return 0;
    }
    return ($current / $total) * 100;
}

function questionTypes()
{
    return ['1' => 'Mcq', '2' => 'Short Question', '3' => 'Long Question'];
}

function paperTypes()
{
    return ['english' => 'English', 'urdu' => 'Urdu',];
}
function difficultylevel()
{
    return ['Easy' => 'Easy', 'Medium' => 'Medium', 'Hard' => 'Hard'];
}
function m_question()
{
    return ['1' => 'Yes', '0' => 'NO'];
}
function colorGradient($rand)
{
    $colorGradient = ['bg-gradient-success', 'bg-gradient-secondary', 'bg-gradient-warning', 'bg-gradient-danger'];
    if (count($colorGradient) < $rand) {
        $rand = 0;
    }
    return $colorGradient[$rand];
}

function sendResponse($result, $message = null)
{
    $response = [
        'success' => true,
        'data'    => $result,
    ];

    if (!empty($message)) {
        $response['message'] = $message;
    }
    return response()->json($response, 200);
}


function sendError($message, $errors = [], $code = 401)
{
    $response = ['response' => false, 'message' => $message];
    if (!empty($errors)) {
        $response['data'] = $errors;
    }
    throw new HttpResponseException(response()->json($response, $code));
}

// For add'active' class for activated route nav-item
function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

// For checking activated route
function is_active_route($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}



// For add 'show' class for activated route collapse
function show_class($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}


function customButton($model, $permission, $route = null, $isShowView = false)
{
    $editPermission = Auth::User()->can($permission . '-edit');
    $showPermission = Auth::User()->can($permission . '-list');
    $deletePermission =  Auth::User()->can($permission . '-delete');
    $editorDeletePermission = Auth::User()->canany([$permission . '-edit', $permission . '-delete']);
    $showPermissionView = '';
    if ($isShowView == true) {
        $showPermissionView =  $showPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.show', $model->id) . '">show</a>' : '';
    }


    return $editorDeletePermission == 1 ? '<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="las la-cog"></i>
</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
 ' . $showPermissionView .  ($editPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.edit', $model->id) . '">Edit</a>' : null)
        . ($deletePermission == 1 ?  '<a class="dropdown-item destory" href="javascript:void(0);"  onclick="distory(\'' .  route($route . ".destroy", $model->id) . '\')">Delete</a>' : null) .
        '</div>

</div>' : null;
}
function customButtonbtn($model, $permission, $route = null, $isShowView = false)
{
    $editPermission = Auth::User()->can($permission . '-edit');
    $showPermission = Auth::User()->can($permission . '-list');
    $deletePermission =  Auth::User()->can($permission . '-delete');
    $editorDeletePermission = Auth::User()->canany([$permission . '-edit', $permission . '-delete']);
    $showPermissionView = '';
    if ($isShowView == true) {
        $showPermissionView =  $showPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.show', $model->id) . '">show</a>' : '';
    }


    return $editorDeletePermission == 1 ? '<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="las la-cog"></i>
</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
 ' .
        '<a class="dropdown-item" href="' . route('ai.question.paper.start', ['id' =>  $model->id]) . '">start</a>' .
        '</div>

</div>' : null;
}
function custommodalButton($model, $permission, $route = null, $isShowView = false)
{
    $editPermission = Auth::User()->can($permission . '-edit');
    $showPermission = Auth::User()->can($permission . '-list');
    $deletePermission =  Auth::User()->can($permission . '-delete');
    $editorDeletePermission = Auth::User()->canany([$permission . '-edit', $permission . '-delete']);
    $showPermissionView = '';
    if ($isShowView == true) {
        $showPermissionView =  $showPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.show', $model->id) . '">show</a>' : '';
    }


    return $editorDeletePermission == 1 ? '<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="las la-cog"></i>
</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
 ' . $showPermissionView .  ($editPermission == 1 ? '<button class="dropdown-item"
 data-toggle="modal" data-target="#editModal"
 data-id=" ' . $model->id . '"
 data-name="' . $model->name . '" data-code="' . $model->code . '" onClick="foo(this);">Edit</button>'  : null)
        . ($deletePermission == 1 ?  '<a class="dropdown-item destory" href="javascript:void(0);"  onclick="distory(\'' .  route($route . ".destroy", $model->id) . '\')">Delete</a>' : null) .
        '</div>
</div>' : null;
}



function papercustomButton($model, $permission, $route = null, $isShowView = false)
{
    $editPermission = Auth::User()->can($permission . '-edit');
    $showPermission = Auth::User()->can($permission . '-list');
    $deletePermission =  Auth::User()->can($permission . '-delete');
    $editorDeletePermission = Auth::User()->canany([$permission . '-edit', $permission . '-delete']);
    $showPermissionView = '';
    if ($showPermission == true) {
        $showPermissionView =  $showPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.show', $model->id) . '">show</a>' : '';
    }


    return $editorDeletePermission == 1 ? '<div class="dropdown custom-dropdown">
    <a class="dropdown-toggle font-20 text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="las la-cog"></i>
</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="will-change: transform;">
 ' . $showPermissionView .  ($editPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.edit', $model->id) . '">Edit</a>' : null)
        . ($deletePermission == 1 ?  '<a class="dropdown-item destory" href="javascript:void(0);"  onclick="distory(\'' .  route($route . ".destroy", $model->id) . '\')">Delete</a>' : null)
        . ($editPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.createpart', $model->id) . '">Create Part</a>' : null)
        . ($editPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.createpartrand', $model->id) . '">Create Random Part  </a>' : null)
        .  ($editPermission == 1 ? '<a class="dropdown-item" href="' .  route($route . '.randompart', $model->id) . '">Create Random Paper</a>' : null) .


        '</div>
</div>' : null;
}
