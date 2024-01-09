<div class="table-responsive mt-3">
    <style>
        .sticky-div {
            position: absolute;
            top: 45%;
            right: 0;
            width: 70px;
            height: 70px;
            background: rgba(65, 101, 167, 0.76);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8.7px);
            -webkit-backdrop-filter: blur(8.7px);
            border-radius: 10px 0 10px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .sticky-div p {
            color: #fff;
            margin-bottom: 0px;
            text-align: center;
        }

        .sticky-div p:nth-child(1) {
            font-weight: 700;
            font-size: 20px;
        }

        .sticky-div p:nth-child(2) {
            font-size: 12px;
        }
    </style>
    <div class="sticky-div">
        <p>{{ $selectedRowCount }}</p>
        <p> Question </p>
    </div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row">

        <div class="col-md-4">
            <label class="d-block">
                <select class="form-control" name="" wire:model="chapter_id" id="chapter_id">
                    <option value="">Select Chapter</option>
                    @foreach ($chapter as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </label>

        </div>
        <div class="col-md-4">
            <label class="d-block">
                <select class="form-control" name="" wire:model="type" id="type">
                    <option value="">Select Question Type</option>
                    <<option value="1">Mcq</option>
                        <<option value="2">Short Question</option>
                            <<option value="3">Long Question</option>

                </select>
            </label>

        </div>
        <div class="col-md-4">
            <label class="d-block">
                <select class="form-control" name="" wire:model="difficulty_level" id="difficulty_level">
                    <option value="">Select Difficulty Level</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>

                </select>
            </label>

        </div>
        <div class="col-md-12">


            <input wire:model="search" type="text" class="form-control" placeholder="Search...">

            <input wire:model="selectedRows" name="part_question" type="hidden">
        </div>
    </div>
    <table id="livewire" class="table table-hover" style="width:100% ;overflow:hidden">
        <thead>
            <tr>
                <th>Select</th>

                <th>ID</th>

                <th>Question</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td><input type="checkbox" wire:model="selectedRows" value="{{ $question->id }}"></td>
                    <td>{{ $question->id }}</td>
                    <td>{!! $question->question !!}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $questions->links('livewire::bootstrap') }}
    </div>
</div>
