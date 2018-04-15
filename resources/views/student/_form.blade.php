<form class="form-horizontal" name="student" method='post' action="">
                        <div class="form-group">
                            <label for="na(me" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-5">
                                <input type="text" name="student[name]" value=" {{old('student')['name'] ? old('student')['name'] : (isset($student->name) ? $student->name : '') }}" class="form-control" id="name" placeholder="请输入学生姓名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="age" class="col-sm-2 control-label">年龄</label>

                            <div class="col-sm-5">
                                <input type="text" name="student[age]" value=" {{old('student')['age'] ? old('student')['age'] : (isset($student->age) ? $student->age : '') }}" class="form-control" id="age" placeholder="请输入学生年龄">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">性别</label>

                            <div class="col-sm-5">
                                @foreach($student->getSex() as $ind=>$val)
                                <label class="radio-inline">
                                    <input type="radio" name="student[sex]"  {{isset($student->sex)&&$student->sex==$ind ?'checked':''}}  value="{{ $ind }}"> {{ $val }}
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    </form>