@extends('common.layouts')


@section('title')
    - 编辑学生
@stop


@section('content')

    @include('common.validator')
    @include('common.message')
    <!-- 自定义内容区域 -->
            <div class="panel panel-default">
                <div class="panel-heading">编辑学生</div>
                <div class="panel-body">
                    @include('student._form')
                </div>
            </div>
    <!-- 分页  -->
    <div class="pull-right">
    </div>
@stop