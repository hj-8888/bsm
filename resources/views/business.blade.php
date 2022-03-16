<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="kor">
<head>
    <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
</head>
<body>
@include('Layout.Sidebar')
<div class="min-h-screen" style="margin-left: 5%; margin-right: 5%;width: 77%;float:right">
    <h1>
        사업
    </h1>
    <h2>{{$pipe->first()->name}} 파이프라인</h2>
    <div style="margin-top: 10px;">
        <label>
            <input type="hidden" name="chk_info" value="부서별" onclick="javascript:checkRadio()">
        </label>
        <label>
            <input type="radio" name="chk_info" value="기간별" onclick="javascript:checkRadio()">기간별 검색
        </label>
        <label>
            <input type="radio" name="chk_info" value="담당자별" onclick="javascript:checkRadio()">담당자별 검색
        </label>
        <label>
            <input type="radio" name="chk_info" value="거래처별" onclick="javascript:checkRadio()">거래처별 검색
        </label>
    </div>

    <div>
        <div id="1" style="display: none;">
            부서 이름 :&nbsp;
            <input class="registerSearch" type="string" name="string">&nbsp;&nbsp;
            <span style="color: grey">
                <i class="fas fa-search" onclick="javascript:clickSearchEvent(this)"></i>
            </span>
        </div>
        <div id="2" style="display: none;">
            <form>
                기간 :&nbsp; <input class="registerSearch" type="date" name="start">~<input class="registerSearch" type="date" name="end">&nbsp;&nbsp;
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div id="3" style="display: none;">
            <form>
                담당자 이름 :&nbsp; <input class="registerSearch" type="string"
                                      name="name">&nbsp;&nbsp;
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div id="4" style="display: none;">
            <form>
                거래처 사업자 번호 :&nbsp; <input class="registerSearch" type="string"
                                      name="contact">&nbsp;&nbsp;
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <table>
        <thead>
        <tr>
            <th>아이디</th>
            <th>거래처</th>
            <th>고객사</th>
            <th>건명</th>
            <th>예상 매출</th>
            <th>예상 매입</th>
            <th>예상 매출이익</th>
            <th>최종컨택일</th>
            <th>진행률</th>
            <th>담당자</th>
            <th>진행사항</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($datas as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->contact->company_name }}</td>
                <td>{{ $item->client }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->expected_sales }}</td>
                <td>{{ $item->expected_purchase }}</td>
                <td>{{ $item->expected_sales_profit }}</td>
                <td>{{ $item->expected_issue_month }}</td>
                <td>{{ $item->progress_rate }}</td>
                <td>{{ $item->sales_person }}</td>
                <td>{{ $item->progress }}</td>
                <td class="buttonColumn">
                    <button class="edit-trigger" onclick="javascript:clickEdit({{$item->id}}, {{$item}})">수정</button>
                    <form action="/business/{{ $item->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <button>삭제</button>
                    </form>
                    <form action="/Estimate/{{$item->id}}" method="POST">
                        @csrf
                        <button>견적서 작성</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div style="height: 10px">
        {{ $datas->links() }}
    </div>

    <button id="register-trigger" style="float: right">등록</button>
</div>

<div style="visibility: hidden">
    <div id="register-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h1 class="title">사업 등록</h1>
            <form method="Post" action="{{route('business')}}">
                @csrf
                <input type="hidden" name="pipeline_id" value={{$pipe->first()->id}}>

                <label>거래처 사업자 번호</label>
                <input type="number" name="contact_id">
                <br>
                <label>고객사</label>
                <input type="text" name="client">
                <br>
                <label>건명</label>
                <input type="text" name="name">
                <br>
                <label>예상매출</label>
                <input type="text" name="expected_sales">
                <br>
                <label>예상매입</label>
                <input type="text" name="expected_purchase">
                <br>
                <label>예상매출이익</label>
                <input type="text" name="expected_sales_profit">
                <br>
                <label>최종 컨택일</label>
                <input type="text" name="expected_issue_month">
                <br>
                <label>진행률</label>
                <input type="text" name="progress_rate">
                <br>
                <label>담당자</label>
                <input type="text" name="sales_person">
                <br>
                <label>진행사항</label>
                <input type="text" name="progress">
                <br>
                <input type="submit" id="register" value="등록">
            </form>
        </div>
    </div>

    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h1 class="title">사업 수정</h1>
            <form action="/business" method="POST">
                @method('put')
                @csrf
                <input type="hidden" name="id" id="edit_id" value = -1>
                <label>고객사</label>
                <input type="text" name="client" id="edit_client">
                <br>
                <label>건명</label>
                <input type="text" name="name" id = "edit_name">
                <br>
                <label>예상매출</label>
                <input type="text" name="expected_sales" id = "edit_e_sales">
                <br>
                <label>예상매입</label>
                <input type="text" name="expected_purchase" id = "edit_e_purchase">
                <br>
                <label>예상매출이익</label>
                <input type="text" name="expected_sales_profit" id = "edit_e_profit">
                <br>
                <label>최종컨택일</label>
                <input type="text" name="expected_issue_month" id = "edit_e_issue">
                <br>
                <label>진행률</label>
                <input type="text" name="progress_rate" id = "edit_progress_rate">
                <br>
                <label>담당자</label>
                <input type="text" name="sales_person" id = "edit_sales_person">
                <br>
                <label>진행사항</label>
                <input type="text" name="progress" id = "edit_progress">
                <br>
                <input type="submit" id="register" value="등록">
            </form>
        </div>
    </div>
</div>
</body>
</html>

<style type="text/css">
    table {
        width: 100%;
        border: 1px solid black
    }

    thead {
        background-color: #eeeeee
    }

    .buttonColumn {
        display: flex;
        flex-direction: row;
    }

    table button {
        display: inline;
    }

    button {
        border: 0 solid #e2e8f0;
    }
</style>

<style>
    a {
        color: inherit;
        text-decoration: inherit
    }

    .modal {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem 1.5rem;
        width: 500px;
        height: 500px;
        border-radius: 0.5rem;
    }

    .close-button {
        float: right;
        width: 1.5rem;
        line-height: 1.5rem;
        text-align: center;
        cursor: pointer;
        border-radius: 0.25rem;
        background-color: lightgray;
    }

    .close-button:hover {
        background-color: darkgray;
    }

    .show-modal {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }

    .registerSearch, .registerSearch textarea {
        width: 439px;
        height: 27px;
        background-color: #efefef;
        border-radius: 6px;
        border: 1px solid #dedede;
        padding: 10px;
        margin-top: 3px;
        font-size: 0.9em;
        color: #3a3a3a;
    }

    .registerSearch:focus, .registerSearch textarea:focus {
        border: 1px solid #97d6eb;
    }

    #1, #2, #3, #4 {
        display: none;
        align-content: center;
    }
</style>

<script type="text/javascript">
    const registerModal = document.querySelector("#register-modal");
    const editModal = document.querySelector("#edit-modal");

    const registerTrigger = document.querySelector("#register-trigger");
    const editTriggerList = document.querySelectorAll(".edit-trigger")
    editTriggerList.forEach((trigger) => {
        trigger.addEventListener("click", showEditModal)
    })

    const closeButtonList = document.querySelectorAll(".close-button");
    closeButtonList.forEach((trigger) => {
        trigger.addEventListener("click", hideModal)
    })
    const registerButton = document.querySelector("#register");

    registerTrigger.addEventListener("click", showRegisterModal);
    registerButton.addEventListener("click", hideModal);

    window.addEventListener("click", windowOnClick);

    function showRegisterModal() {
        registerModal.classList.add("show-modal")
    }

    function showEditModal() {
        editModal.classList.add("show-modal")
    }

    function hideModal() {
        console.log("hide")
        registerModal.classList.remove("show-modal");
        editModal.classList.remove("show-modal");
    }

    function windowOnClick(event) {
        console.log(event.target)
        if (event.target === registerModal) {
            hideModal();
        }
        if (event.target === editModal) {
            hideModal();
        }
        if (event.target === closeButton) {
            hideModal();
        }
    }

    function checkRadio() {
        var test = document.getElementsByName('chk_info');
        if (test[0].checked == true )
        {
            document.getElementById('1').style.display="";
            document.getElementById('2').style.display="none";
            document.getElementById('3').style.display="none";
            document.getElementById('4').style.display="none";
        }
        else if (test[1].checked == true )
        {
            document.getElementById('1').style.display="none";
            document.getElementById('2').style.display="";
            document.getElementById('3').style.display="none";
            document.getElementById('4').style.display="none";
        }
        else if (test[2].checked == true )
        {
            document.getElementById('1').style.display="none";
            document.getElementById('2').style.display="none";
            document.getElementById('3').style.display="";
            document.getElementById('4').style.display="none";
        }
        else if (test[3].checked == true )
        {
            document.getElementById('1').style.display="none";
            document.getElementById('2').style.display="none";
            document.getElementById('3').style.display="none";
            document.getElementById('4').style.display="";
        }
    }

    function clickRegisterEvent(trObj) {
        var link = "http://127.0.0.1:8000/Estimate";

        location.href = link;
    };

    function clickSearchEvent(trObj) {
        var link = "http://127.0.0.1:8000/manager_management";

        location.href = link;
    };

    function clickEdit(id, item) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_sales_person').value = item.sales_person;
        document.getElementById('edit_progress').value = item.progress;
        document.getElementById('edit_progress_rate').value = item.progress_rate;
        document.getElementById('edit_e_issue').value = item.expected_issue_month;
        document.getElementById('edit_e_sales').value = item.expected_sales;
        document.getElementById('edit_e_profit').value = item.expected_sales_profit;
        document.getElementById('edit_e_purchase').value = item.expected_purchase;
        document.getElementById('edit_name').value = item.name;
        document.getElementById('edit_client').value = item.client;
    };

</script>

