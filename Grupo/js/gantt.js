class Gantt {

    /**
    * Init representation in HTML 
    * @param {array} the tasks list
    * 
    */
    constructor(tasks) { 
      this.tasks = tasks;
      this.dateWidth = 178;
      this.setMinAndMaxDate(); 
      document.getElementById('gantt').innerHTML = this.buildTableHeader() + this.buildTableBody();
    }
  
  
    /**
    * Get min and max dates from all tasks
    * 
    */
    setMinAndMaxDate(){
      var maxDates = [];
      var minDates = [];
  
      for(let i = 0; i < this.tasks.length; i++){
        minDates.push(new Date(this.tasks[i][1]));
        maxDates.push(new Date(this.tasks[i][2]));     
      }
      this.minDate = new Date(Math.min.apply(null,minDates));
      this.maxDate = new Date(Math.max.apply(null,maxDates)); 
  
    }   
  
  
    /**
    * Generate the html for the table header
    * @returns {Sting} Html code
    */
    buildTableHeader(){
      var html = '<table><thead><tr>';
      var diffDays = this.diffInDays(this.maxDate, this.minDate) + 1;
      const actual = new Date(this.minDate);  
  
      for(let i = 0; i < diffDays; i++){
        //actual.setDate(actual.getDate() + 1);
        html += '<th>'+actual.toISOString().substr(0, 10).replace('T', ' ')+"</th>";  
        actual.setDate(actual.getDate() + 1);   
      }
      html += '</tr></thead><tbody>';
  
      return html;
    }
  
  
    /**
    * Generate the html for the table body
    * @returns {Sting} Html code
    */
    buildTableBody(){
      var html = '';
  
      for(let i = 0; i < this.tasks.length; i++){
        var task = this.tasks[i]; 
  
        var dMin = new Date(task[1]);
        var dMax = new Date(task[2]);     
  
        var days = this.diffInDays(dMax, dMin) + 1;
        var daysBefore = this.diffInDays(this.minDate, dMin);
        var daysAfter = this.diffInDays(dMax, this.maxDate);
  
        if(this.minDate == dMin) daysBefore = 0;
        if(this.maxDate == dMax) daysAfter = 0;
  
        html += '<tr>';
        if(daysBefore > 0) for(let j = 0; j < daysBefore; j++) html += '<td></td>';
        html += '<td class="event-cell" colspan="'+days+'" style="background-color: '+task[3]+';"><span>'+task[4]+'% done</span>'+task[0]+'</td>';
        if(daysAfter > 0) for(let j = 0; j < daysAfter; j++) html += '<td></td>';
        html += '</tr>';
      }
  
      html += '</tbody></table>';
  
      return html;
  
    }
  
  
    /**
    * Calculate diff in days between two dates
    * @param {date} the max date
    * @param {date} the min date
    * @returns {integer} num of days
    */
    diffInDays(max, min){
      var diffTime = Math.abs(max - min);
      return Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    }
  
  
  }