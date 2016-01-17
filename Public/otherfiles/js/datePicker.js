function message_date(name){
		//$(window).load(function(){
        $(name).glDatePicker(
	     {
			    showAlways: true,
			    cssName: 'flatwhite',
			    monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
			    dowNames: ['日','一','二','三','四','五','六'],
//			    selectedDate: new Date(),
//			    specialDates: [
//			        {
//			            date: new Date(2013, 0, 8),
//			            data: { message: 'Meeting every day 8 of the month' },
//			            repeatMonth: true
//			        },
//			        {
//			            date: new Date(0, 0, 1),
//			            data: { message: 'Happy New Year!' },
//			            repeatYear: true
//			        },
//			      ],
//			     onClick: function(target, cell, date, data) {
//			        target.val(date.getFullYear() + ' - ' +
//			                    date.getMonth() + ' - ' +
//			                    date.getDate());
//
//			        if(data != null) {
//			            alert(data.message + '\n' + date);
//			        }
//			    }
			});           
  //});
}